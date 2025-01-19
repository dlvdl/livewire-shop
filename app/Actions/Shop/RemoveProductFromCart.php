<?php

namespace App\Actions\Shop;

use App\Factories\CartFactory;

class RemoveProductFromCart
{
    public function remove($cartItemId): void
    {
        $cartItem = CartFactory::make()->items()->find($cartItemId);

        $cartItem?->delete();
    }
}
