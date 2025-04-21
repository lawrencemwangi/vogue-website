<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;



Route::get('/',[HomeController::class, 'HomePage'])->name('home');
Route::get('/about',[HomeController::class, 'AboutPage'])->name('about');
Route::get('/shop',[HomeController::class, 'ShopPage'])->name('shop');
Route::post('/contact', [MessageController::class, 'store'])->name('messages.store');
Route::get('/contact',[HomeController::class, 'ContactPage'])->name('contact');
Route::get('/user/dash', [HomeController::class, 'Dashboard'])->name('dash_board');

Route::post('/cart/{id}', [CartController::class, 'AddToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.view');
Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');
Route::post('/cart/update/{id}/{action}', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/order', [OrderController::class, 'storeCheckout'])->name('place_order');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','admin')->group(function() {
    Route::get('admin/Dashboard', [DashboardController::class, 'Dashboard'])->name('admin_dashboard');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/messages', MessageController::class)->except('create', 'store');
    Route::resource('admin/shop', ShopController::class);
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/orders', OrderController::class);
});

require __DIR__.'/auth.php';
