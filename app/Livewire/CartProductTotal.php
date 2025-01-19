<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Money\Money;

class CartProductTotal extends Component
{
    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh'
    ];

    public function render(): View
    {
        return view('livewire.cart-product-total');
    }

    #[Computed]
    public function total(): Money
    {
        $cartItems = CartFactory::make()->items()->with('product')->get();
        $total = Money::UAH(0);

        foreach ($cartItems as $cartItem) {
            $total = $total->add($cartItem->product->price->multiply($cartItem->quantity));
        }

        return $total;
    }
}
