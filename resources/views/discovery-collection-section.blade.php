<div class="bg-[url('/public/assets/discovery-image.png')] bg-cover bg-no-repeat h-[780px]">
    <div class="h-full w-full flex justify-center items-center">
        <div class="bg-primaryWhite pt-[30px] pb-[60px] px-[94px] bg-opacity-80 rounded text-primaryBlack font-Poppins">
            <p class="text-center text-6xl mb-4">🌱</p>
            <h1 class="text-center text-6xl mb-4">The nature candle</h1>
            <p class="text-center text-lg max-w-[530px]">All handmade with natural soy wax, Candleaf is a companion for all your pleasure moments</p>
            <div class="flex justify-center mt-10">
                @include('components.button',
                        [
                            'text' => 'Discovery our collection',
                            'link' => '/discovery-collection'
                        ])
            </div>
        </div>
    </div>
</div>
