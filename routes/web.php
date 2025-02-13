<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductPageController;
use App\Livewire\Pages\CartPage;
use App\Livewire\Pages\CheckoutPage;
use App\Livewire\Pages\Dashboard\Home as DashboardHomePage;
use App\Livewire\Pages\Dashboard\Products as DashboardProductsPage;
use App\Livewire\Pages\Dashboard\Orders as DashboardOrdersPage;
use Illuminate\Support\Facades\Route;


Route::view('/login', 'pages.Auth.login-page')->name('login-page');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductPageController::class, 'show'])->name('product');
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/checkout', CheckoutPage::class)->name('checkout');

//Route::middleware(['auth:sanctum'])->group(function () {
//
//});
