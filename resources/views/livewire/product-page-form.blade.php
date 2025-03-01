<div x-data="{
        product: @js($product),
        productQuantity: 1,
        subscriptionType: 'subscribe',
        subscriptionDuration: '1_weeks',
        async onAddToCartClick() {
            await this.$wire.addProductToCart({...this.product, quantity: this.productQuantity});

            this.$dispatch('show-notification', {
                message: 'Product added to cart successfully'
            });
        }
    }"
    class="relative"
>

    <form>
        <h1 class="font-Poppins text-2xl font-medium mb-4">{{ $product->name }}®</h1>

        <div class="w-full grid grid-cols-[35%,_65%] font-Poppins">
            <div>
                <p class="text-2xl font-semibold text-primaryGreen my-4">{{ $product->price }}</p>
                <label class="inline-block text-lg font-Roboto mb-2" for="quantity">Quantity</label>
                <div :style="{
                        width: productQuantity > 99 ? '120px' :
                        '100px'
                    }"
                >
                    <x-quantity-selector x-model="productQuantity"/>
                </div>
            </div>

            <div>
                <div>
                    <x-radio-input
                        id="oneTimePurchase"
                        name="purchaseOption"
                        value="oneTime"
                        x-model="subscriptionType"
                        defaultChecked="true"
                    >
                    <span class="font-Roboto">
                        One time purchase
                    </span>
                    </x-radio-input>
                </div>
                <div>
                    <x-radio-input
                        id="subscribe"
                        name="purchaseOption"
                        value="subscribe"
                        x-model="subscriptionType"
                    >
                        <div class="">
                            <div class="flex items-end relative gap-4 font-Roboto">
                                <p>
                                    Subscribe and delivery every
                                </p>
                                <x-select
                                    :options="[
                                '1_weeks' => '1 Week',
                                '2_weeks' => '2 Weeks',
                                '4_weeks' => '4 Weeks'
                               ]
                              "
                                    defaultSelected="1_weeks"
                                    id="subsription_duration_select"
                                    name="subscription_duration_select"
                                    x-model="subscriptionDuration"
                                >
                                    <x-slot:trigger>
                                        <div
                                            @click="toggle"
                                            class="border border-[#DBDBDB] cursor-pointer flex justify-between items-center px-0.5"
                                            :class="{ 'bg-gray-100': disabled }"
                                            x-bind:disabled="disabled"
                                        >
                                            <div class="flex items-center flex-nowrap text-nowrap gap-2">
                                                <span x-text="selected ? options[selected] : 'One week'"
                                                      class="text-gray-700 text-sm"></span>
                                                <svg x-show="!open" class="w-3 h-3 text-gray-500" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                                <svg x-show="open" class="w-3 h-3 text-gray-500" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M19 15l-7-7-7 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </x-slot:trigger>
                                </x-select>
                            </div>
                            <p class="font-Poppins pt-2 text-[#656565] font-medium text-sm">
                                Subscribe now and get the 10% of discount on every recurring order. The discount will be
                                applied at checkout.
                                <a class="text-primaryGreen underline">See details.</a>
                            </p>
                        </div>
                    </x-radio-input>
                </div>

                <div class="w-full mt-[67px]">
                    <button type="button"
                            @click="onAddToCartClick"
                            class="flex justify-center gap-4 bg-primaryGreen text-primaryWhite text-base lg:text-xl rounded px-[44px] py-4 w-full hover:opacity-80"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Add to cart
                    </button>
                </div>

                <div class="w-full border rounded-lg border-[E6E6E6] mt-[40px] p-[22px] font-Poppins text-sm">
                    <ul class="space-y-2">
                        <li>
                            <span>Wax:</span>
                            <span
                                class="text-[#656565]">Top grade Soy wax that delivers a smoke less,  consistent burn.</span>
                        </li>
                        <li>
                            <span>Fragrance:</span>
                            <span class="text-[#656565]">Premium quality ingredients with natural essential oils.</span>
                        </li>
                        <li>
                            <span>Burning Time:</span>
                            <span class="text-[#656565]">70-75 hours.</span>
                        </li>
                        <li>
                            <span>Dimension: </span>
                            <span class="text-[#656565]">10cm x 5cm.</span>
                        </li>
                        <li>
                            <span>Weight: </span>
                            <span class="text-[#656565]">400g.</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </form>
</div>
