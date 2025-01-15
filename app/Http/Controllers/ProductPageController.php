<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductPageController extends Controller
{
    public function show($id): View
    {
        $product = Product::with('galleryImage')->find($id);

        return view('pages.product-page', ['product' => $product]);
    }
}
