<div
    wire:ignore
    x-data="{
        cities: [],
        departments: [],
        loading: false,
        selectedCity: null,
        init() {
            this.$watch('selectedCity', async (value) => {
                if (value) {
                    this.departments = await this.$wire.searchDepartments(value.mainDescription, value.ref);
                }
            });
        },
        handleSubmit(e) {
            e.preventDefault();
            console.log($validate.isComplete('form'));
            console.log($validate.data(e.target));
            console.log(this.selectedCity);
        },
        async handleCityInput(query) {
          this.cities = await this.$wire.searchCities(query);
        }
    }"
    class="max-w-2xl lg:max-w-7xl mx-auto text-primaryBlack font-Roboto">
    <div class="grid grid-cols-2">
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
                    <select x-validate="$el.value !== 'not_selected'" name="deliveryMethod" x-model="form.deliveryMethod" class="select select-bordered w-full bg-primaryWhite focus:border-primaryGreen">
                        <option value="not_selected" disabled selected>Delivery method</option>
                        <option value="nova_post">Nova Post</option>
                    </select>
                    <div
                        @click.outside="handleClickOutside"
                        x-data="{
                            query: '',
                            show: false,
                            handleClickOutside() {
                                this.show = false;

                                if (!this.isValidCity) {
                                    this.query = '';
                                    selectedCity = null;
                                }

                                $validate.updateData('city');
                                $validate.toggleError('city', true);
                            },
                            handleOptionClick(value) {
                                this.query = value.name;
                                this.show = false;

                                selectedCity = { ...value };
                                $validate.updateData('city');
                                $validate.toggleError('city', true);
                            },
                            get isValidCity() {
                                return cities.find((value) => {
                                    return value.name === this.query
                                });
                            }
                        }"
                        class="relative">
                        <div>
                            <input
                                :class="isValidCity ? '' : 'border-red-500'"
                                @input.debounce.250ms="handleCityInput(query)"
                                x-model="query"
                                @change="show=true"
                                @click="show=true"
                                type="text" placeholder="City"
                                class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen"
                                data-error-msg='Select city from the list'
                                name="city"
                                x-validate.required
                            />
                        </div>

                        <template x-if="cities.length > 0 && show">
                            <div class="absolute top-14 left-0 bg-primaryWhite w-full border border-primaryBlack max-h-[200px] overflow-y-scroll">
                                <template x-for="city in cities">
                                    <div @click="handleOptionClick(city)" class="w-full hover:bg-primaryGreen px-4 py-1 cursor-pointer">
                                        <span x-text="city.name"></span>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                    <template x-if="selectedCity">
                        <select name="novaPostDepartment" x-model="form.novaPostDepartment"
                               class="select select-bordered w-full bg-primaryWhite focus:border-primaryGreen">
                            <option disabled selected>Nova Post Department</option>
                            <template x-for="department in departments">
                                <option x-text="department.description"></option>
                            </template>
                        </select>
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
