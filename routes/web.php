<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PostController as AdminPost;
use App\Http\Controllers\admin\CategoriesController;


Route::get('/', [PostController::class,'index'])->name("index");
Route::get('/post/{post:slug}', [PostController::class,'show'])->name("post.show");
Route::get('/author/{user:username}', [PostController::class,'authorFilter'])->name("posts.authorFilter");
Route::get('/category/{category:slug}', [PostController::class,'categoryFilter'])->name("posts.categoryFilter");

Route::post('/logout', [SessionController::class,'destroy'])->middleware("auth")->name("login.destroy");

Route::middleware(['guest'])->group(function(){
    Route::resource('register',RegisterController::class)->only('index','store');
    Route::resource('login',SessionController::class)->only('index','store');
});

Route::prefix("dashboard")->middleware("auth")->group(function () {
    Route::get('/', [AdminController::class,'index'])->name("dashboard");

    Route::resource('categories',CategoriesController::class)->parameters([
        'categories' => 'category:slug',
    ]);
    Route::resource("posts",AdminPost::class)->parameters([
        'posts' => 'post:slug',
    ]);

});