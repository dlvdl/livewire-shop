@props([
    'product'
])

<div class="w-full bg-primaryWhite drop-shadow cursor-pointer">
    <div>
        <div class="w-full bg-[#F7F8FA] flex justify-center">
            <img class="h-[210px] w-[280px]" src="{{ asset($product->galleryImage->path) }}">
        </div>
        <p class="text-xl font-Poppins text-primaryBlack font-medium pt-2 px-4">{{ $product->name }}</p>
        <p class="font-Roboto text-primaryGreen font-medium text-right px-4">{{ $product->price }}</p>
    </div>
</div>
