<?php

namespace App\Livewire;

use App\Actions\Shop\AddProductToCart;
use App\Actions\Shop\RemoveProductFromCart;
use App\Models\CartItem;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Computed;

class CartProductTableRow extends Component
{
    public CartItem $item;
    public int $quantity = 1;

    public function render(): View
    {
        return view('livewire.cart-product-table-row');
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
