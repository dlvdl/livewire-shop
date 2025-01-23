<?php

namespace App\Livewire\Pages;

use App\Factories\CartFactory;
use App\Services\NovaPostService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Money\Money;

class CheckoutPage extends Component
{
    public Collection $cartItems;
    public array $cities;
    public string $query = '';

    protected $listeners = [
        'searchCities' => 'searchCities',
    ];

    public function render(): View
    {
        return view('livewire.pages.checkout-page')->layout('components.layouts.checkout');
    }

    public function mount(NovaPostService $novaPostService): void
    {
        $this->cartItems = CartFactory::make()->items()
            ->with('product', 'product.galleryImage')
            ->get();

        $this->cities = $novaPostService->getCities('A');
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

    public function searchCities(string $query): array
    {
        $novaPostService = new NovaPostService();

        return $novaPostService->getCities($query);
    }

    public function searchDepartments(string $query, string $ref): array
    {
        $novaPostService = new NovaPostService();

        return $novaPostService->getDepartments($query, $ref);
    }
}
