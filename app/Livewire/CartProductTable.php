<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class CartProductTable extends Component
{
    public Collection $cartItems;

    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh'
    ];

    public function render(): View
    {
        return view('livewire.cart-product-table')
            ->layout('components.layouts.app');
    }

    public function mount(): void
    {
        $this->cartItems = CartFactory::make()->items()
            ->with('product', 'product.galleryImage')
            ->get();
    }
}
