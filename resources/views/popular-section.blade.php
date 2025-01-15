@props([
    'products'
])

<div class="h-full font-Poppins">
    <h2 class="text-center font-medium text-4xl pb-2">Popular</h2>
    <p class="text-center text-[#5E6E89]">Our top selling product that you may like</p>
    <div class="w-full grid grid-cols-4 mb-[120px] gap-8 mt-[50px]">
        @foreach($products as $product)
            <x-product :product="$product"/>
        @endforeach
    </div>
</div>

