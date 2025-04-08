<?php

namespace App\Services;

use App\Interfaces\StateServiceInterface;
use App\Models\Post;
use App\Models\User;

class StateService implements StateServiceInterface
{
    public function index(){
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $usersWithoutPosts = User::doesntHave('posts')->count();

        return [
            'total_users' => $totalUsers,
            'total_posts' => $totalPosts,
            'users_without_posts' => $usersWithoutPosts,
        ];
    }
}