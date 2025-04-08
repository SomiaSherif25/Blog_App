<?php 
namespace App\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResgisterRequest;

interface AuthServiceInterface{
    public function register(ResgisterRequest $request);
    public function login(LoginRequest $request);
}