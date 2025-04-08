<?php 
namespace App\Interfaces;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResgisterRequest;
use App\Models\Post;
use App\Models\User;

interface StateServiceInterface{
    public function index();
}