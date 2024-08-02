<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return 'this is the home page';
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
  Route::get('/auth/login', [AuthController::class, 'loginView'])->name('loginView');
  Route::get('/auth/register', [AuthController::class, 'registerView'])->name('registerView');
});
