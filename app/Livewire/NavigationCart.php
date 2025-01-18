<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Illuminate\View\View;
use Livewire\Component;

class NavigationCart extends Component
{
    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh'
    ];

    public function render(): View
    {
        return view('livewire.navigation-cart');
    }

    public function getCartItemsCountProperty()
    {
        return CartFactory::make()->items()->sum('quantity');
    }
}
