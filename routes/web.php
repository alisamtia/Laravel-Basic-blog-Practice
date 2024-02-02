<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminComment;
use App\Http\Controllers\Admin\PostController as AdminPost;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [PostController::class,'index'])->name("index");
Route::get('/post/{post:slug}', [PostController::class,'show'])->name("post.show");
Route::get('/author/{user:username}', [PostController::class,'authorFilter'])->name("posts.authorFilter");
Route::get('/category/{category:slug}', [PostController::class,'categoryFilter'])->name("posts.categoryFilter");

Route::delete('/logout', [SessionController::class,'destroy'])->middleware("auth")->name("logout");

Route::resource('comments',CommentController::class)->only('destroy','store');

Route::middleware(['guest'])->group(function(){
    Route::resource('register',RegisterController::class)->only('index','store');
    Route::resource('login',SessionController::class)->only('index','store');
});

Route::prefix("dashboard")->middleware("AuthOrAdmin")->group(function () {
    Route::get('/', [AdminController::class,'index'])->name("dashboard");

    Route::resource('categories',CategoriesController::class)->parameters([
        'categories' => 'category:slug',
    ]);
    Route::resource("posts",AdminPost::class)->parameters([
        'posts' => 'post:slug',
    ]);

    Route::resource("users",UserController::class)->middleware("can:admin")->parameters([
        'users' => 'user:username',
    ]);

    Route::resource('comments',AdminComment::class)->only('index','edit','update');

});