<?php

namespace App\Livewire;

use App\Actions\Shop\AddProductToCart;
use App\Actions\Shop\RemoveProductFromCart;
use App\Models\CartItem;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CartProductCard extends Component
{
    public CartItem $item;
    public int $quantity = 1;

    public function render()
    {
        return view('livewire.cart-product-card');
    }

    public function mount(): void
    {
        $this->quantity = $this->item->quantity ?? 1;
    }

    #[Computed]
    public function subtotal()
    {
        return $this->item->product->price->multiply($this->quantity);
    }

    public function updateSubtotal($quantity, AddProductToCart $cart): void
    {
        $cart->add($this->item->product->id, $quantity - $this->item->quantity);

        $this->dispatch('productAddedToCart');
    }

    public function removeItem(RemoveProductFromCart $cart): void
    {
        $cart->remove($this->item->id);

        $this->dispatch('productRemovedFromCart');
    }
}
