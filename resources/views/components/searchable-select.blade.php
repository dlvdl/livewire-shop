@props([
    'validationRequired' => false,
    'name' => '',
    'placeholder' => '',
])

<div
    @click.outside="handleClickOutside"
    x-data="{
        validationRequired: @js($validationRequired),
        formFieldName: @js($name),
        selectData: {
            options: [],
            selectedOption: null
        },
        query: '',
        show: false,
        handleClickOutside() {
            this.show = false;

            if (!this.isValidOption) {
                this.query = '';
                this.selectData.selectedOption = null;
            }

            if (this.validationRequired) {
                $validate.updateData(this.formFieldName);
                $validate.toggleError(this.formFieldName, true);
            }
        },
        handleOptionClick(value) {
            this.query = value.name;
            this.show = false;

            this.selectData.selectedOption = { ...value };

            if (this.validationRequired) {
                $validate.updateData(this.formFieldName);
                $validate.toggleError(this.formFieldName, true);
            }
        },
        handleUserInput() {
            this.$dispatch(`${this.formFieldName}-select-updated`, this.query);
        },
        get isValidOption() {
            return this.selectData.options?.find((item) => {
                return item.name === this.query;
            });
        }}"
    class="relative"
    {{ $attributes }}
    x-modelable="selectData"
>
    <div>
        <input
            :class="isValidOption ? '' : 'border-red-500'"
            @input.debounce.250ms="handleUserInput"
            x-model="query"
            @change="show=true"
            @click="show=true"
            type="text" placeholder="{{ $placeholder }}"
            class="input input-bordered w-full bg-primaryWhite focus:border-primaryGreen relative z-0"
            data-error-msg='Select department from the list'
            :name="formFieldName"
            x-validate.required
        />
    </div>

    <template x-if="selectData.options?.length > 0 && show">
        <div
            class="absolute z-50 top-14 left-0 bg-primaryWhite w-full border border-primaryBlack max-h-[200px] overflow-y-scroll">
            <template x-for="option in selectData.options">
                <div @click="handleOptionClick(option)"
                     class="w-full hover:bg-primaryGreen px-4 py-1 cursor-pointer">
                    <span x-text="option.name"></span>
                </div>
            </template>
        </div>
    </template>
</div>
