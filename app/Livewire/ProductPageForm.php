<?php

namespace App\Livewire;

use App\Actions\Shop\AddProductToCart;
use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductPageForm extends Component
{
    public Product $product;

    public array $rules = [
        'product' => ['required', 'exists:App\Models\Product,id'],
    ];

    public function render(): View
    {
        return view('livewire.product-page-form');
    }

    public function addProductToCart(AddProductToCart $cart, $product): void
    {
        $cart->add($product['id'], $product['quantity']);

        $this->dispatch('productAddedToCart');
    }
}
