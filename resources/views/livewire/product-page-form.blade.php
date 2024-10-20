<form x-data="{
        productQuantity: 1,
        subscriptionType: 'subscribe',
        subscriptionDuration: '1_weeks',
    }">
    <h1 class="font-Poppins text-2xl font-medium mb-4">Spiced Mint Candleaf®</h1>

    <div class="w-full grid grid-cols-[35%,_65%]">
        <div>
            <p class="text-2xl font-semibold text-primaryGreen my-4">$ 9.99</p>
            <label class="inline-block text-lg font-Roboto mb-2" for="quantity">Quantity</label>
            <div class="w-[85px]">
                <x-input x-model="productQuantity"/>
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
                    One time purchase
                </x-radio-input>
            </div>
            <div>
                <x-radio-input
                    id="subscribe"
                    name="purchaseOption"
                    value="subscribe"
                    x-model="subscriptionType"
                >
                    <div class="flex items-center relative gap-2">
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
                        />
                    </div>

                </x-radio-input>
            </div>
        </div>

        <button @click.prevent="console.log(subscriptionDuration)">Test</button>
    </div>
</form>
