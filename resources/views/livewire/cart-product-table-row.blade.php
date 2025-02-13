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
    <td class="text-start py-6">
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
    <td>{{ $item->product->price }}</td>
    <td class="text-center">
        <div class="flex justify-center">
            <div class="w-[75px]">
                <x-quantity-selector x-model="quantity"/>
            </div>
        </div>
    </td>
    <td class="text-end">{{ $this->subtotal }}</td>
</tr>
