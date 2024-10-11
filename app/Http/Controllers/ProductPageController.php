<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductPageController extends Controller
{
    public function show($product): View
    {
        return view('pages.product-page', ['product' => $product]);
    }
}
