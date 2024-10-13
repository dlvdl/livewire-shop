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
    x-modelable="value"
    class="flex gap-2 items-center"
    {{ $attributes }}
>
    <div @click="toggle" class="grid place-items-center">
        <input
            class="border-[#DBDBDB]
                        form-radio text-primaryGreen
                        appearance-none w-4 h-4 p-2
                        border-2 rounded-full
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
        <div x-show="checked" class="w-2 h-2 rounded-full bg-primaryGreen col-start-1 row-start-1">
        </div>
    </div>
    <label for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
