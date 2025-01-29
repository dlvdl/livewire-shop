<?php

namespace App\Actions\Shop;

use App\Enums\ShippingStatusType;
use App\Factories\CartFactory;
use App\Models\Order;

class CreateOrder
{
    public function create(array $formData)
    {
        $removeAction = new RemoveProductFromCart();
        $cart = CartFactory::make();
        $cartItems = $cart->items;

        $formData = [
            ...$formData,
            'status' => ShippingStatusType::PENDING,
            'name' => $formData['firstName'] . ' ' . $formData['lastName'],
        ];

        $order = Order::create($formData);

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
