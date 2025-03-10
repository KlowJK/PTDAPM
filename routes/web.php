<?php

use App\Http\Controllers\Document\AcceptController;
use App\Http\Controllers\Document\TeacherDocumentController;
use App\Http\Controllers\Document\TrashDocumentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('document', DocumentController::class);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('trash', TrashDocumentController::class);
    Route::resource('accept', AcceptController::class);
});
Route::resource('teacher', TeacherDocumentController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
