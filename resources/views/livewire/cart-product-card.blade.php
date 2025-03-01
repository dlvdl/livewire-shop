<div
    x-data="{
        quantity: 1,
        init() {
            this.$watch('quantity', async () => {
                this.$wire.updateSubtotal(this.quantity);
            })
        }
    }"
    class="w-full flex flex-col space-y-4 py-4 px-2">
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
        <p>{{ $item->product->price }}</p>
    </div>
    <div><x-quantity-selector x-model="quantity"/></div>
</div>
