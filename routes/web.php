<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PostController as AdminPost;
use App\Http\Controllers\admin\CategoriesController;


Route::get('/', [PostController::class,'index'])->name("index");
Route::get('/post/{post}', [PostController::class,'show'])->name("post.show");

Route::post('/logout', [SessionController::class,'destroy'])->middleware("auth");

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SessionController::class,'index'])->name("login");
    Route::post('/login', [SessionController::class,'store'])->name("login.store");

    Route::get('/register', [RegisterController::class,'index'])->name("register");
    Route::post('/register', [RegisterController::class,'store'])->name("regster.store");
});

Route::prefix("dashboard")->middleware("admin")->group(function () {
    Route::get('/', [AdminController::class,'index'])->name("dashboard");

    Route::resources([
        'categories'=>CategoriesController::class,
        "posts"=>AdminPost::class
    ]);

});