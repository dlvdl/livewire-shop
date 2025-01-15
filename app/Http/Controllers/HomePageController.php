<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomePageController extends Controller
{
    public function index() {
        $products = Product::with('galleryImage')->get();
        $popularProducts = $products->slice(0, 4);

        return view('pages.home-page', [
            'products' => $products,
            'popularProducts' => $popularProducts
        ]);
    }
}
