<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;
use App\Models\Post;
use App\Policies\CategoryPolicy;
use App\Models\Category;
use Illuminate\Pagination\Paginator; 

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Post::class => PostPolicy::class,
        Category::class => CategoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Paginator::useBootstrap();
    }
}
