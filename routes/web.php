<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Models\Items;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//   return view('home');
// })->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
  Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
});

Route::middleware('auth')->group(function () {
  Route::get('/', function () {
    $items = Items::all();

    return view('home')->with('items', $items);
  })->name('home');

  Route::get('/items', [ItemController::class, 'index'])->name('items');
  Route::post('/create-items', [ItemController::class, 'create'])->name('create.items');
  Route::patch('/update-items/{id}', [ItemController::class, 'update'])->name('update.items');
  Route::delete('/delete-items/{id}', [ItemController::class, 'delete'])->name('delete.items');

  Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
  Route::post('/create-transaction', [TransactionController::class, 'create'])->name('create.transaction');
  Route::delete('/delete-transaction/{id}', [TransactionController::class, 'delete'])->name('delete.transaction');
});
