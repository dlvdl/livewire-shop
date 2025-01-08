<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CartPageController extends Controller
{
    public function index(): View
    {
        return view('pages.cart-page');
    }
}
