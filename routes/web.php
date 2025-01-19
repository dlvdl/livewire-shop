<?php

use App\Http\Controllers\CartPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductPageController;

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductPageController::class, 'show'])->name('product');
Route::get('/cart',  \App\Livewire\CartProductTable::class)->name('cart');

