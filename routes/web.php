<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AccountController;

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


Route::get('/accounts', [AccountController::class, 'index']);  
Route::post('/accounts', [AccountController::class, 'store']); 
Route::get('/accounts/{id}', [AccountController::class, 'show']); 
Route::put('/accounts/{id}', [AccountController::class, 'update']); 
Route::delete('/accounts/{id}', [AccountController::class, 'destroy']); 

require __DIR__.'/auth.php';
