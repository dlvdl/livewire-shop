@props([
    'options' => [],
    'name',
    'id' => '',
    'placeholder' => 'Select an option',
    'defaultSelected' => null,
    'disabled' => false,
    'trigger'
])

<div
    x-data="{
        selected: @js($defaultSelected),
        disabled: false,
        open: false,
        options: {},
        toggle() {
            if (!this.disabled) this.open = !this.open;
        },
        selectOption(value) {
            this.selected = value;
            this.open = false;
        }
    }"
    x-init="options = @js($options)"
    x-modelable="selected"
    class="relative"
    {{ $attributes }}
>
    <input type="hidden" name="{{ $name }}" :value="selected">

    {{ $trigger }}


    <div
        x-show="open"
        @click.away="open = false"
        class="absolute mt-2 bg-white border border-gray-300 rounded-lg shadow-lg z-10 w-full"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        x-cloak
    >
        <template x-for="(label, value) in options" :key="value">
            <div
                @click="selectOption(value)"
                :class="{'bg-primaryGreen text-white': selected === value, 'hover:bg-gray-100': selected !== value}"
                class="px-2 py-2 cursor-pointer text-sm"
                x-text="label"
            ></div>
        </template>
    </div>
</div>
