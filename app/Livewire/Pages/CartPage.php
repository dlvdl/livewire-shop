<?php

namespace App\Livewire\Pages;

use App\Factories\CartFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class CartPage extends Component
{
    public Collection $cartItems;

    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh'
    ];

    public function render(): View
    {
        return view('livewire.pages.cart-page');
    }

    public function mount(): void
    {
        $this->cartItems = CartFactory::make()->items()
            ->with('product', 'product.galleryImage')
            ->get();
    }
}
