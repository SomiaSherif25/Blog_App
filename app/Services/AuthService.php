<?php
namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResgisterRequest;
use App\Http\Resources\UserDataResource;
use App\Interfaces\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function register(ResgisterRequest $request){
        $validated =  $request->validated();

        $user = User::create($validated);

        $token = $user->createToken('authToken')->plainTextToken;

        return [
            'token'=> $token,
            'user' => new UserDataResource($user)
        ];
    }

    public function login(LoginRequest $request){
        $credentials = $request->validated();

        $user = User::where('phone', $credentials['phone'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return false;
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return [
            'token'=> $token,
            'user' => new UserDataResource($user)
        ];
    }
}