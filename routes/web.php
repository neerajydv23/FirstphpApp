<?php

use Illuminate\Support\Facades\Route;

// Using Controllers
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// User Routes
Route::get('/', [UserController::class, 'showCorrectHomepage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('isLoggedin');

// Blog Post Routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('isLoggedin');
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('isLoggedin');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);

//  Profile Routes
Route::get('/profile/{user:username}', [UserController::class, 'profile']);