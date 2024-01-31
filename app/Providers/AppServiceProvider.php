<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("update-post", function ($user,$post)
        {
            return $user->role==="admin" || $post->user_id===$user->id;
        });

        Gate::define("update-category", function ($user,$category)
        {
            return $user->role==="admin" || $category->user_id===$user->id;
        });

        Gate::define("admin", function ($user)
        {
            return $user->role==="admin";
        });
    }
}
