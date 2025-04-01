<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('products', [ProductsController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');
Route::get('products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');


Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/', [FrontController::class, 'index'])->name('front.index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::get('/home', function () {
    return view('home'); 
})->name('home');

