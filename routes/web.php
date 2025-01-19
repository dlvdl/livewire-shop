<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductPageController;
use App\Livewire\Pages\CartPage;

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductPageController::class, 'show'])->name('product');
Route::get('/cart', CartPage::class)->name('cart');

