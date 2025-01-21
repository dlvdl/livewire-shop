<div class="max-w-2xl lg:max-w-7xl mx-auto text-primaryBlack font-Roboto h-full">
    <div class="grid grid-cols-2 h-full">
        <div class="bg-primaryWhite pt-4 px-4">
            <a href="{{ route('home') }}">
                <svg class="w-[120px] h-[34px]">
                    <use xlink:href="/icons.svg#logo-header"></use>
                </svg>
            </a>

            <div class="w-full mt-8">
                <form class="space-y-3">
                    <div>
                        <h3 class="font-Roboto text-xl font-medium">Contact</h3>
                    </div>
                    <input type="text" placeholder="Email" class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen" />
                    <input type="text" placeholder="Phone" class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen" />
                    <div class="grid grid-cols-2 gap-x-4">
                        <input type="text" placeholder="First Name" class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen" />
                        <input type="text" placeholder="Last Name" class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen" />
                    </div>
                    <div>
                        <h3 class="font-Roboto text-xl font-medium mt-8">Delivery Method</h3>
                    </div>
                    <select class="select select-bordered w-full bg-primaryWhite focus:border-primaryGreen">
                        <option disabled selected>Delivery method</option>
                        <option>Nova Post</option>
                    </select>
                    <select class="select select-bordered w-full bg-primaryWhite focus:border-primaryGreen">
                        <option disabled selected>City</option>
                        <option>Kyiv</option>
                        <option>Greedo</option>
                    </select>
                    <select class="select select-bordered w-full bg-primaryWhite focus:border-primaryGreen">
                        <option disabled selected>Nova Post Department</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>

                    <div>
                        <h3 class="font-Roboto text-xl font-medium mt-8">Comment</h3>
                    </div>
                    <textarea class="textarea textarea-bordered bg-primaryWhite w-full focus:border-primaryGreen" placeholder="Comment"></textarea>

                    <div class="w-full flex justify-between items-center">
                        <a href="{{ route('cart') }}" class="text-xl text-primaryGreen underline">Back To Cart</a>
                        <button type="submit" class="bg-primaryGreen text-primaryWhite text-xl rounded px-[44px] py-4">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-[#F2F2F2] pt-8 px-4">
            <div class="space-y-8">
                @foreach($cartItems as $cartItem)
                    <div class="flex gap-4">
                        <div class="relative bg-primaryWhite">
                            <img class="w-[160px] h-[120px]" src="{{ asset($cartItem->product->galleryImage->path) }}">
                            <div class="absolute -top-1 -right-1 bg-primaryGreen w-6 h-6 aspect-square rounded-full flex justify-center items-center">
                                <span class="text-white">{{ $cartItem->quantity }}</span>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h3 class="font-Poppins font-medium">{{ $cartItem->product->name }}</h3>
                            <h4 class="font-Poppins font-semibold text-lg text-primaryGreen">{{ $cartItem->product->price->multiply($cartItem->quantity) }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full flex justify-between mt-8 font-Roboto">
                <span class="font-medium text-lg">Total: </span>
                <span class="font-medium text-2xl">{{ $this->total }}</span>
            </div>
        </div>
    </div>
</div>
