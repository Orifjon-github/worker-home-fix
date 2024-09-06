<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Helpers\Helpers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationCodeMail;
use App\Models\User;
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
        $code = mt_rand(100000, 999999);
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = User::updateOrCreate(['username' => $username], $create);
            if (!$user) return $this->error('Create User Error. Try Again');
            Mail::to($username)->send(new VerificationCodeMail($code));
            $user->sms_code()->updateOrCreate(['user_id' => $user->id], ['code' => $code]);
        } elseif ($phone = $this->checkPhone($username)) {
            $create['username'] = $phone;
            $user = User::updateOrCreate(['username' => $phone], $create);
            if (!$user) return $this->error('Create User Error. Try Again');
            $sms = $this->smsService->sms($username, $code);
            if ($sms) {
                $user->sms_code()->updateOrCreate(['user_id' => $user->id], ['code' => $code]);
            } else {
                return $this->error('Send Sms Error');
            }
        } else {
            return $this->error('Invalid Username Format');
        }

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

        $user = User::where('username', $username)->first();

        if (!$user) return $this->error('You have not account, Please register', 404);

        if (!Hash::check($password, $user->password)) {
            return $this->error('Invalid Password', 403);
        }

        if ($user->status == 'wait') $this->error('You have not account, Please register', 404);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success(['token' => $token]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

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
            $code = '777777';
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
        $request->user()->delete();

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
}

