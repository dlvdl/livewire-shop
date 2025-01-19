<div class="flex py-10 gap-10 items-center justify-end font-Roboto">
    <div>
        <div class="font-medium text-lg flex justify-between">
            <span class="w-text-end">Sub-total </span>
            <span>{{ $this->total }}</span>
        </div>

        <p class="text-[#656565] mt-4">
            Tax and shipping cost will be calculated later
        </p>
    </div>
    <div>
        <x-button text="Checkout" link=""></x-button>
    </div>
</div>
