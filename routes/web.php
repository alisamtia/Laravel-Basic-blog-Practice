<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PostController as AdminPost;
use App\Http\Controllers\admin\CategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class,'index'])->name("index");
Route::get('/post/{post}', [PostController::class,'show']);

Route::get('/login', [SessionController::class,'index'])->middleware("guest")->name("login");
Route::post('/login', [SessionController::class,'store'])->middleware("guest");
Route::post('/logout', [SessionController::class,'destroy'])->middleware("auth");

Route::get('/register', [RegisterController::class,'index'])->middleware("guest")->name("register");
Route::post('/register', [RegisterController::class,'store'])->middleware("guest");


Route::get('/dashboard', [AdminController::class,'index'])->can("admin")->name("dashboard");

Route::get('/dashboard/categories', [CategoriesController::class,'index'])->can("admin")->name("categories");
Route::get('/dashboard/category/new', [CategoriesController::class,'new'])->can("admin")->name("new-category");
Route::delete('/dashboard/category/{category}', [CategoriesController::class,'destroy'])->can("admin");
Route::post('/dashboard/category/new', [CategoriesController::class,'create'])->can("admin");
Route::get('/dashboard/category/{category}', [CategoriesController::class,'edit'])->can("admin");
Route::put('/dashboard/category/{category}', [CategoriesController::class,'update'])->can("admin");

Route::get('/dashboard/posts', [AdminPost::class,'index'])->can("admin")->name("posts");
Route::get('/dashboard/post/new', [AdminPost::class,'new'])->can("admin")->name("new-post");
Route::post('/dashboard/post/new', [AdminPost::class,'store'])->can("admin");
Route::delete('/dashboard/post/{post}', [AdminPost::class,'destroy'])->can("admin");
Route::get('/dashboard/post/{post}', [AdminPost::class,'edit'])->can("admin");
Route::put('/dashboard/post/{post}', [AdminPost::class,'update'])->can("admin");


// resource controllers
// router groups