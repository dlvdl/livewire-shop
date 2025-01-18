<a href="{{ route('cart') }}">
    <div class="flex gap-2 items-center">
        <svg class="w-7 h-7">
            <use xlink:href="/icons.svg#cart"></use>
        </svg>

        <div class="bg-primaryGreen aspect-square p-1 px-2 rounded-full text-white text-sm flex items-center justify-center">
            <span>
                {{ $this->cartItemsCount }}
            </span>
        </div>
    </div>
</a>
