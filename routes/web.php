<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResearchPaperController;
use Illuminate\Support\Facades\Route;

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



Route::get('/documents/hidden', [DocumentController::class, 'hiddenHistory'])->name('documents.hiddenHistory');

Route::resource('documents', DocumentController::class)->parameters([
    'documents' => 'matailieu'
]);


Route::patch('/documents/{matailieu}/approve', [DocumentController::class, 'approve'])->name('documents.approve');
Route::post('/documents/{matailieu}/hide', [DocumentController::class, 'hide'])->name('documents.hide');
Route::post('/documents/{matailieu}/restore', [DocumentController::class, 'restore'])->name('documents.restore');
Route::delete('/documents/{matailieu}', [DocumentController::class, 'destroy'])->name('documents.destroy');

Route::resource('researchpapers', ResearchPaperController::class);


require __DIR__.'/auth.php';
