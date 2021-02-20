<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::post('/create', [PostController::class, 'store'])->name('posts.store');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    });
});
