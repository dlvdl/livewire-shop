<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\LoginPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductPageController;
use App\Livewire\Pages\CartPage;
use App\Livewire\Pages\CheckoutPage;


Route::view('/login', 'pages.Auth.login-page')->name('login-page');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductPageController::class, 'show'])->name('product');
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/checkout', CheckoutPage::class)->name('checkout');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
