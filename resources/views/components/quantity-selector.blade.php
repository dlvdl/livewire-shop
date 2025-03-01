<div x-data="{
       value: 1
     }"
     x-modelable="value"
     class="grid grid-cols-3 border border-primaryGreen"
     {{ $attributes }}

    >
    <button @click.prevent="value++" class="font-Roboto text-lg text-center hover:text-primaryGreen">+</button>
    <input  disabled class="font-Roboto text-lg text-center px-1 bg-primaryWhite"  name="quantity" :value="value">
    <button :disabled="value < 2" @click.prevent="value > 1 ? value-- : value" class="font-Roboto text-lg text-center disabled:hover:text-primaryBlack hover:text-primaryGreen">-</button>
</div>
