<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\PostService;
use App\Services\StateService;
use App\Services\TagService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('AuthService',function(){
            return new AuthService();
        });
        $this->app->bind('AuthService',function(){
            return new PostService();
        });
        $this->app->bind('AuthService',function(){
            return new StateService();
        });
        $this->app->bind('AuthService',function(){
            return new TagService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
