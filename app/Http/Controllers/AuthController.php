<?php

namespace App\Http\Controllers;

use App\Facades\AuthFacade;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResgisterRequest;
use App\Models\User;
use App\Services\ApiResponseFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(ResgisterRequest $request){
       $user = AuthFacade::register($request);
       return ApiResponseFormat::success($user,'User registered successfully');
    }

    public function login(LoginRequest $request){
        $user = AuthFacade::login($request);
        if(!$user){
            return ApiResponseFormat::error('Invalid credentials',401);
        }
        return ApiResponseFormat::success($user,'User logged in successfully');
    }
}
