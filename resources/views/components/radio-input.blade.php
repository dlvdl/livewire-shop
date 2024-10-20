@props([
    'defaultChecked' => false,
    'disabled' => false,
    'name',
    'id',
    'value',
])

<div
    x-data="{
        checked: @js($defaultChecked),
        disabled: @js($disabled),
        value: null,
        toggle() {
            this.value = '{{ $value }}'
            this.checked = true;
            this.$dispatch('radio-selected', { name: '{{ $name }}', value: '{{ $value }}' });
        }
    }"
    x-on:radio-selected.window="
        if ($event.detail.name === '{{ $name }}' && $event.detail.value !== '{{ $value }}') {
            checked = false;
        }
    "
    x-init="checked = @js($defaultChecked)"
    x-modelable="value"
    class="flex items-start gap-4 p-4 rounded-lg"
    :class="checked ? 'border-2 border-[#DBDBDB]' : 'border-0'"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform scale-75 opacity-0"
    x-transition:enter-end="transform scale-100 opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="transform scale-100 opacity-100"
    x-transition:leave-end="transform scale-75 opacity-0"
    {{ $attributes }}
>
    <div @click="toggle" class="grid place-items-center">
        <input
            class="border-[#DBDBDB]
                        form-radio text-primaryGreen
                        appearance-none w-4 h-4 p-2
                        border-4 rounded-full
                        col-start-1 row-start-1
                        shrink-0
                   "
            id="{{ $id }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            :checked="checked"
            x-model="checked"
        >
        <div x-show="checked"
             class="w-3 h-3 rounded-full bg-primaryGreen col-start-1 row-start-1"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="transform scale-75 opacity-0"
             x-transition:enter-end="transform scale-100 opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="transform scale-100 opacity-100"
             x-transition:leave-end="transform scale-75 opacity-0"
        >
        </div>
    </div>
    <label for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
