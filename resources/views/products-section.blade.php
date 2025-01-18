@props([
    'products'
])

<div class="font-Poppins text-primaryBlack relative z-0">
    <h1 class="text-4xl text-center mb-4 font-medium">Products</h1>
    <p class="text-center text-lg text-[#5E6E89] font-medium mb-16">Order it for you or for your beloved ones </p>
    <div class="w-full grid grid-cols-3 mb-[120px] gap-8 z-0">
        @foreach($products as $product)
            <x-product :product="$product"/>
        @endforeach
    </div>
</div>
