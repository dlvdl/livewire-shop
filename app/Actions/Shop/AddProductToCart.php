<?php

namespace App\Actions\Shop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductToCart
{
    public function add($productId)
    {
        CartFactory::make()->items()->firstOrCreate(
            ['product_id' => $productId],
            ['quantity' => 0]
        )
        ->increment('quantity');
    }
}
