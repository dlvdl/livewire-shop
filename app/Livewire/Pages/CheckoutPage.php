<?php

namespace App\Livewire\Pages;

use App\Factories\CartFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Money\Money;

class CheckoutPage extends Component
{
    public Collection $cartItems;

    public function render(): View
    {
        return view('livewire.pages.checkout-page')->layout('components.layouts.checkout');
    }

    public function mount(): void
    {
        $this->cartItems = CartFactory::make()->items()
            ->with('product', 'product.galleryImage')
            ->get();
    }

    #[Computed]
    public function total(): Money
    {
        $total = Money::UAH(0);

        foreach ($this->cartItems as $cartItem) {
            $total = $total->add($cartItem->product->price->multiply($cartItem->quantity));
        }

        return $total;
    }
}
