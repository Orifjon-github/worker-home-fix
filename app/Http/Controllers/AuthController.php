<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Helpers\Helpers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    use Response, Helpers;
    public function register(RegisterRequest $request): JsonResponse
    {
        $create = $request->all();
        $username = $request->input('username');
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return $this->error('Technical process');
        } elseif ($phone = $this->checkPhone($username)) {
            $create['username'] = $phone;
        }else{
            return $this->error('Invalid Username Format');
        }
        
        $user = User::create($create);
        if (!$user) return $this->error('Create User Error. Try Again');

        $user->token = $user->createToken('auth_token')->plainTextToken;

        return $this->success($user);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $username = $request->username;
        $password = $request->password;

        $type = is_numeric($username) ? 'phone' : 'email';
        $user = User::where($type, $username)->first();

        if (!$user) return $this->error('User Not Found', 404);

        if(!Hash::check($password, $user->password) ){
            return $this->error('Invalid Password', 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success(['token' => $token]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return $this->success(['message' => 'Logged out successfully']);
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

