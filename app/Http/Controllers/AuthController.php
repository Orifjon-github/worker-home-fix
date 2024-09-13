<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Helpers\Helpers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use App\Models\UserFcmToken;
use App\Services\SmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    use Response, Helpers;

    private SmsService $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $create = $request->all();
        $username = $request->input('username');
        $fcm_token = $request->input('fcm_token');
        $is_email = filter_var($username, FILTER_VALIDATE_EMAIL);
        if (!$is_email) {
            $username = $this->checkPhone($username);
            $create['username'] = $username;
        }
        if (!$username) return $this->error('Invalid Format Username');

        $user = User::where('username', $username)->where('status', 'active')->first();
        if ($user && $user->status == 'active') return $this->error($username . ' already registered');

        $code = mt_rand(100000, 999999);
        $create['status'] = 'wait';

        if ($fcm_token) unset($create['fcm_token']);

        $user = User::updateOrCreate(['username' => $username], $create);
        if (!$user) return $this->error('Create User Error. Try Again');

        if ($fcm_token) $user->fcm_tokens()->create(['token' => $fcm_token]);

        $sms = $is_email ? Mail::to($username)->send(new VerificationCodeMail($code)) : $this->smsService->sms($username, $code);
        if (!$sms) return $this->error('Send Sms Error');

        $user->sms_code()->updateOrCreate(['user_id' => $user->id], ['code' => $code]);
        return $this->success(['message' => "Sms code sent to $username"]);
    }

    public function registerConfirm(Request $request): JsonResponse
    {
        $username = $request->input('username');
        $code = $request->input('code');

        $user = User::where('username', $username)->first();
        if ($user && $user->status == 'wait') {
            $check = self::checkCode($user, $code);
        } else {
            return $this->error('Service error, connect with developers');
        }

        if ($check instanceof JsonResponse) return $check;

        $user->wallet()->create(['wallet_id' => self::generateWalletId()]);

        $user->status = 'active';
        $user->save();

        $user->token = $user->createToken('auth_token')->plainTextToken;

        return $this->success($user);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $username = $request->username;
        $password = $request->password;
        $fcm_token = $request->fcm_token;

        $user = User::where('username', $username)->first();

        if (!$user) return $this->error('You have not account, Please register', 404);

        if (!Hash::check($password, $user->password)) {
            return $this->error('Invalid Password', 403);
        }

        if ($user->status == 'wait') $this->error('You have not account, Please register', 404);

        $token = $user->createToken('auth_token')->plainTextToken;

        if ($fcm_token) {
            $user->fcm_tokens()->create(['token' => $fcm_token]);
        }

        return $this->success(['token' => $token]);
    }

    public function logout(Request $request): JsonResponse
    {
        $fcm_token = $request->input('fcm_token');
        $request->user()->tokens()->delete();
        if ($fcm_token) {
            UserFcmToken::where('token', $fcm_token)->delete();
        }

        return $this->success(['message' => 'Logged out successfully']);
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        $username = $request->input('username');
        $user = User::where('username', $username)->first();
        if (!$user && $user->status == 'wait') return $this->error('You have not account, Please register', 404);

        $code = mt_rand(100000, 999999);
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            Mail::to($username)->send(new VerificationCodeMail($code));
            $user->sms_code()->updateOrCreate(['user_id' => $user->id], ['code' => $code]);
        } elseif ($phone = $this->checkPhone($username)) {
            $sms = $this->smsService->sms($phone, $code);
            if ($sms) {
                $user->sms_code()->updateOrCreate(['user_id' => $user->id], ['code' => $code]);
            } else {
                return $this->error('Send Sms Error');
            }
            $user->sms_code()->updateOrCreate(['user_id' => $user->id], ['code' => $code]);
        } else {
            return $this->error('Invalid Username Format');
        }

        return $this->success(['message' => "Sms code sent to $username"]);
    }

    public function forgotPasswordConfirm(Request $request): JsonResponse
    {
        $username = $request->input('username');
        $code = $request->input('code');
        $user = User::where('username', $username)->first();

        $check = self::checkCode($user, $code);
        if ($check instanceof JsonResponse) return $check;

        return $this->success(['message' => 'Sms code confirm, You can change password']);
    }

    public function forgotPasswordNewPassword(Request $request): JsonResponse
    {
        $password = $request->input('password');
        $username = $request->input('username');
        $user = User::where('username', $username)->first();
        if (!$user) return $this->error('You have not account, Please register', 404);

        $user->update(['password' => Hash::make($password)]);
        return $this->success(['message' => 'Password reset successfully']);
    }

    public function delete(Request $request): JsonResponse
    {
        $user = $request->user();
        $user->status = 'deleted';
        $user->save();

        return $this->success(['message' => 'Account deleted successfully']);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback($provider): JsonResponse
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // You can create or update the user here
        $user = User::updateOrCreate([
            'provider_id' => $socialUser->getId(),
            'provider' => $provider,
        ], [
            'username' => $socialUser->getEmail(),
            'name' => $socialUser->getName(),
            'avatar' => $socialUser->getAvatar(),
        ]);

        // Generate token
        $token = $user->createToken('authToken')->accessToken;

        // Return the token and user data to the frontend
        return response()->json(['token' => $token, 'user' => $user], 200);
    }

    public function googleRegister(Request $request): JsonResponse
    {
        $username = $request->input('username');
        $fcm_token = $request->input('fcm_token');
        $user = User::where('username', $username)->first();
        if ($user) return $this->error('Username already exists');
        $create = $request->all();
        $create['password'] = Hash::make('secret');
        $create['provider'] = 'google';
        $user = User::create($create);

        $user->wallet()->create(['wallet_id' => self::generateWalletId()]);
        if ($fcm_token) $user->fcm_tokens()->create(['token' => $fcm_token]);
        $user->status = 'active';
        $user->save();

        $user->token = $user->createToken('auth_token')->plainTextToken;

        return $this->success($user);
    }

    public function googleLogin(Request $request): JsonResponse
    {
        $fcm_token = $request->input('fcm_token');
        $username = $request->input('username');
        $user = User::where('username', $username)->first();
        if (!$user) return $this->error('You have not account, Please register', 404);
        if ($user->provider == 'google') {
            $token = $user->createToken('auth_token')->plainTextToken;
            if ($fcm_token) {
                $user->fcm_tokens()->create(['token' => $fcm_token]);
            }
            return $this->success(['token' => $token]);
        }

        return $this->error("Siz Google orqali ro'yhatdan o'tmagansiz. Shuning uchun Google orqali login qila olmaysiz");
    }

    public function facebookRegister(Request $request): JsonResponse
    {
        $username = $request->input('username');
        $fcm_token = $request->input('fcm_token');
        $create = $request->all();
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('username', $username)->first();
        } elseif ($phone = $this->checkPhone($username)) {
            $user = User::where('username', $phone)->first();
            $create['username'] = $phone;
        } else {
            return $this->error('Invalid Username Format');
        }

        if ($user) return $this->error('Username already exists');
        $create['password'] = Hash::make('secret');
        $create['provider'] = 'facebook';
        $user = User::create($create);

        $user->wallet()->create(['wallet_id' => self::generateWalletId()]);
        if ($fcm_token) $user->fcm_tokens()->create(['token' => $fcm_token]);
        $user->status = 'active';
        $user->save();

        $user->token = $user->createToken('auth_token')->plainTextToken;

        return $this->success($user);
    }

    public function facebookLogin(Request $request): JsonResponse
    {
        $fcm_token = $request->input('fcm_token');
        $username = $request->input('username');
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) $username = $this->checkPhone($username);
        $user = User::where('username', $username)->first();
        if (!$user) return $this->error('You have not account, Please register', 404);
        if ($user->provider == 'facebook') {
            $token = $user->createToken('auth_token')->plainTextToken;
            if ($fcm_token) {
                $user->fcm_tokens()->create(['token' => $fcm_token]);
            }
            return $this->success(['token' => $token]);
        }

        return $this->error("Siz Facebook orqali ro'yhatdan o'tmagansiz. Shuning uchun Facebook orqali login qila olmaysiz");
    }
}

