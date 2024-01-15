<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
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
