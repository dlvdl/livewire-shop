<?php

namespace App\Actions\Shop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductToCart
{
    public function add($productId, $quantity=1): void
    {
        $cartItem = CartFactory::make()->items()->firstOrCreate(
            ['product_id' => $productId],
            ['quantity' => 0]
        );

        $cartItem->quantity = $cartItem->quantity + $quantity;
        $cartItem->save();
    }
}
