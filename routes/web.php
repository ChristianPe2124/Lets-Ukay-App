<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// # All routes
Auth::routes();
// # Home, Buy Page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buy', [App\Http\Controllers\ProductController::class, 'buyPage'])->name('buy');
// # Admin Home, Add Product, Product View
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// # Admin Product Create
Route::post('/admin/home', [App\Http\Controllers\AdminProductController::class, 'create'])->name('createItem.post');
// # Admin Edit
Route::put('/admin/home/{id}', [App\Http\Controllers\AdminProductController::class, 'update']);
Route::delete('/admin/home/{id}', [App\Http\Controllers\AdminProductController::class, 'destroy']);
