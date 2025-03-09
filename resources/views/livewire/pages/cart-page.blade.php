
<div class="h-full text-primaryBlack max-w-2xl lg:max-w-7xl mx-auto py-10">
    <div class="flex justify-center flex-col items-center gap-y-6 mb-6">
        <h1 class="font-Poppins text-2xl font-medium mb-4">
            @if(count($cartItems) < 1)
                Your cart is empty
            @else
                Your cart items
            @endif
        </h1>
        <a class="text-primaryGreen underline text-lg font-Roboto" href="{{ route('home') }}">Back to shopping</a>
    </div>
    <div class="flex justify-center">
        <div class="w-full">
            @if(count($cartItems) > 0)
                <div class="w-full flex px-4">
                    <table class="w-full">
                        <thead>
                            <tr class="font-Roboto font-medium">
                                <td class="text-start py-4 hidden md:table-cell">Product</td>
                                <td class="py-4 hidden md:table-cell">Price</td>
                                <td class="text-center py-4 hidden md:table-cell">Quantity</td>
                                <td class="text-end py-4 hidden md:table-cell">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $cartItem)
                            <livewire:cart-product-table-row :item="$cartItem" :key="$cartItem->id . 'table-row'"/>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <livewire:cart-product-total/>
            @endif
        </div>
    </div>

</div>
