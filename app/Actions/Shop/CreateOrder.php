<?php

namespace App\Actions\Shop;

use App\Factories\CartFactory;
use App\Models\Order;

class CreateOrder
{
    public function create(array $formData)
    {
        $cart = CartFactory::make();
        $cartItems = $cart->items;
        $order = Order::create($formData);
        $removeAction = new RemoveProductFromCart();

        foreach ($cartItems as $cartItem) {
            $order->items()->create([
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price->getAmount(),
            ]);

            $removeAction->remove($cartItem->id);
        }

        $cart->delete();
    }
}
