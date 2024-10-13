<div x-data="{
       value: 1
     }"
     x-modelable="value"
     class="min-w-[80px] grid grid-cols-[minmax(10px,_1fr)_minmax(40px,_1fr)_minmax(10px,_1fr)] border border-primaryGreen"
     {{ $attributes }}

    >
    <button @click.prevent="value++" class="font-Roboto text-lg text-right hover:text-primaryGreen pl-4">+</button>
    <input  disabled class="w-[50px] font-Roboto text-lg text-center overflow-ellipsis px-1" type="number" name="quantity" :value="value">
    <button :disabled="value < 2" @click.prevent="value > 1 ? value-- : value" class="font-Roboto text-lg text-left disabled:hover:text-primaryBlack hover:text-primaryGreen pr-4">-</button>
</div>
