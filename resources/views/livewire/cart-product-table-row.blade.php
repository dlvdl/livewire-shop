<tr
    x-data="{
        quantity: @entangle('quantity'),
        init() {
            this.$watch('quantity', async () => {
                this.$wire.updateSubtotal(this.quantity);
            })
        }
    }"
    class="border-t border-b border-[#E5E5E5] py-6">
    <td class="text-start py-6 hidden md:table-cell">
        <div class="flex">
            <div>
                <img class="w-[160px] h-[130px]" src="{{ asset($item->product->galleryImage->url) }}">
            </div>
            <div>
                <h3 class="font-medium font-Poppins text-2xl mb-4">{{ $item->product->name }}</h3>
                <button wire:click="removeItem()">
                        <span class="text-primaryGreen underline text-lg font-Roboto">
                            Remove
                        </span>
                </button>
            </div>
        </div>
    </td>
    <td class="hidden md:table-cell">{{ $item->product->price }}</td>
    <td class="text-center hidden md:table-cell" :style="{
                        width: quantity > 99 ? '116px' :
                        quantity > 9 ? '100px' :
                        '75px'
                    }">
        <div class="flex justify-center w-full">
            <div>
                <x-quantity-selector x-model="quantity"/>
            </div>
        </div>
    </td>
    <td class="text-end hidden md:table-cell">{{ $this->subtotal }}</td>
    <td colspan="4" class="text-end md:hidden">
        <div class="w-full flex flex-col space-y-4 py-4 px-2">
            <div class="flex justify-between">
                <div class="border rounded">
                    <img class="object-contain w-[100px]"
                         src="{{ asset($item->product->galleryImage->url) }}">
                </div>
                <div>
                    <h3 class="font-medium font-Poppins text-2xl mb-4">{{ $item->product->name }}</h3>
                    <button wire:click="removeItem()">
                <span class="text-primaryGreen underline text-lg font-Roboto">
                    Remove
                </span>
                    </button>
                </div>
            </div>
            <div class="flex justify-between">
                <p>Price</p>
                <p>{{ $item->product->price }}</p>
            </div>
            <div class="flex justify-between">
                <p>Price</p>
                <p>{{ $this->subtotal }}</p>
            </div>
            <div>
                <x-quantity-selector x-model="quantity"/>
            </div>
        </div>
    </td>
</tr>
