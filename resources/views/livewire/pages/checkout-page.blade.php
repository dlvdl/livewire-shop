<div
    wire:ignore
    x-data="{
        cities: @entangle('cities'),
        departments: @entangle('departments'),
        loading: false,
        selectedCity: null,
        selectedDepartment: null,
        init() {
            this.$watch('selectedCity', () => {
                this.departments = [];
                this.selectedDepartment = null;
            })

           document.addEventListener('shipping_address-select-updated', async (e) => {
                console.log(e.detail)
                await this.handleCityInput(e.detail);
           })

           document.addEventListener('nova_post_department-select-updated', async (e) => {
                await this.handleDepartmentInput(e.detail);
           })
        },
        handleSubmit(e) {
            e.preventDefault();

            const isValid = $validate.isComplete('form');

            if (isValid) {
                const validatedData = $validate.data(e.target);
                const formData = {};

                validatedData.forEach((item) => {
                    const { name, value } = item;

                    formData[name] = value;
                });

                console.log(formData)

                this.$wire.submit(formData);
            }
        },
        async handleCityInput(query) {
            await this.$wire.searchCities(query);
        },
        async handleDepartmentInput(query) {
            await this.$wire.searchDepartments(query, this.selectedCity.mainDescription);
        }
    }"
    class="max-w-2xl lg:max-w-7xl mx-auto text-primaryBlack font-Roboto h-full">
    <div class="grid grid-cols-2 h-full">
        <div class="bg-primaryWhite pt-4 px-4">
            <a href="{{ route('home') }}">
                <svg class="w-[120px] h-[34px]">
                    <use xlink:href="/icons.svg#logo-header"></use>
                </svg>
            </a>

            <div class="w-full mt-8">
                <form id="form" x-data x-validate @submit="handleSubmit" class="space-y-3">
                    <div>
                        <h3 class="font-Roboto text-xl font-medium">Contact</h3>
                    </div>
                    <input :class="$formData.email.valid ? '' : 'border-red-500'"
                       data-error-msg='Enter valid email address'
                       name="email" x-validate.required
                       type="email" placeholder="Email"
                       class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen" />

                    <input :class="$formData.phone.valid ? '' : 'border-red-500'"
                       data-error-msg='Enter valid phone number'
                       name="phone" x-validate.required
                       type="tel" placeholder="Phone"
                       class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen" />

                    <div class="grid grid-cols-2 gap-x-4">
                        <div>
                            <input :class="$formData.firstName.valid ? '' : 'border-red-500'"
                              data-error-msg='Enter First name' x-validate.required name="firstName"
                              type="text" placeholder="First Name"
                              class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen mb-2"/>
                        </div>
                        <div>
                            <input :class="$formData.lastName.valid ? '' : 'border-red-500'"
                               data-error-msg='Enter Last name'
                               x-validate.required  name="lastName"
                               type="text" placeholder="Last Name"
                               class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen mb-2" />
                        </div>
                    </div>
                    <div>
                        <h3 class="font-Roboto text-xl font-medium mt-8">Delivery Method</h3>
                    </div>
                    <select x-validate="$el.value !== 'not_selected'" name="shipping_method" x-model="form.deliveryMethod" class="select select-bordered w-full bg-primaryWhite focus:border-primaryGreen">
                        <option value="not_selected" disabled selected>Delivery method</option>
                        <option value="nova_post">Nova Post</option>
                    </select>

                    <x-searchable-select
                        validationRequired="true"
                        name="shipping_address"
                        :placeholder="'City'"
                        x-model="{
                            options: cities,
                            selectedOption: selectedCity
                        }"
                    />

                    <template x-if="selectedCity">
                        <x-searchable-select
                            validationRequired="true"
                            name="nova_post_department"
                            :placeholder="'Department'"
                            x-model="{
                                options: departments,
                                selectedOption: selectedDepartment
                            }"
                        />
                    </template>

                    <div>
                        <h3 class="font-Roboto text-xl font-medium mt-8">Comment</h3>
                    </div>
                    <textarea name="comment" class="textarea textarea-bordered bg-primaryWhite w-full focus:border-primaryGreen" placeholder="Comment"></textarea>

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
                            <img class="w-[160px] h-[120px]" src="{{ asset($cartItem->product->galleryImage->url) }}">
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

    <livewire:modal/>
</div>
