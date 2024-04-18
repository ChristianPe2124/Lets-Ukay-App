<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// # All routes
Auth::routes();
Auth::routes(['verify' => true]);
// # My Account
Route::get('/myAccount', [HomeController::class, 'myAccount'])->name('myAccount');
Route::post('/myAccount', [HomeController::class, 'editMyAccount'])->name('myAccount.post');
// # Home, Buy Page
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/buy', [ProductController::class, 'buyPage'])->name('buy');

Route::post('/buy', [ProductController::class, 'category'])->name('category');

// # User Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.post');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart_destroy');
Route::delete('/DeleteAllSelected', [CartController::class, 'destroyAllSelected'])->name('all_selected_destroy');
// # User Order Details
Route::get('/my-orders', [CartController::class, 'myOrders'])->name('orders');
Route::get('/order-details/{id}/{created_at}', [CartController::class, 'orderDetails']);
Route::post('/order-details', [CartController::class, 'orderDetailsCreate'])->name('order-details.post');
// #User Order Delivered
Route::post('/my-order', [CartController::class, 'orderDelivered'])->name('orderDelivered');
// # Sell
Route::get('/sell', [MailController::class, 'sellPage'])->name('sell');
Route::post('/sell', [MailController::class, 'sellMail'])->name('sell.post');
// # Donate
Route::get('/donate', [MailController::class, 'donatePage'])->name('donate');
Route::post('/donate', [MailController::class, 'donateMail'])->name('donate.post');
// # Admin Home, Add Product, Product View
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// # Admin Product Create
Route::post('/admin/home', [AdminProductController::class, 'create'])->name('createItem.post');
// # Admin Edit
Route::put('/admin/home/{id}', [AdminProductController::class, 'update']);
Route::delete('/admin/home/{id}', [AdminProductController::class, 'destroy']);
// # Admin Request
Route::get('/request', [AdminRequestController::class, 'request'])->name('request');
Route::get('/request-view/{id}', [AdminRequestController::class, 'requestView'])->name('request-view');
Route::get('/request-process/{id}/{created_at}', [AdminRequestController::class, 'request_process']);
Route::post('/request-process', [AdminRequestController::class, 'requestCreate'])->name('request.post');
// # Admin Transaction
Route::get('/transaction', [AdminRequestController::class, 'transaction'])->name('transaction');
Route::get('/transaction-view/{id}/{created_at}', [AdminRequestController::class, 'transactionView']);
Route::get('/transaction-history/{id}/{created_at}', [AdminRequestController::class, 'transactionHistory']);
Route::post('/transaction', [AdminRequestController::class, 'transactionDestroy'])->name('transaction.cancel');
