<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/search', [UserController::class, 'search'])->name('users.search');
    Route::patch('/users/{tentaikhoan}/lock', [UserController::class, 'lock'])->name('users.lock');
    Route::resource('news', NewsController::class);
    Route::get('/searchtt', [NewsController::class, 'search'])->name('news.searchtt');
    Route::patch('/news/{matintuc}/approve', [NewsController::class, 'approve'])->name('news.approve');
    Route::patch('/news/{matintuc}/reject', [NewsController::class, 'reject'])->name('news.reject');
});

require __DIR__ . '/auth.php';
