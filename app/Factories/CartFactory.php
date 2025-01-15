<?php

namespace App\Factories;

use App\Models\Cart;

class CartFactory
{
    public static function make(): Cart
    {
        return Cart::firstOrCreate(['session_id' => session()->getId()]);
    }
}
