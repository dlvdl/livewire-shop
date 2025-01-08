@extends('components.layouts.app')

<?php $slot = ''?>

@section('content')
    <div class="h-full text-primaryBlack max-w-2xl lg:max-w-7xl mx-auto py-10">
        <div class="flex justify-center flex-col items-center gap-y-6 mb-6">
            <h1 class="font-Poppins text-2xl font-medium mb-4">Your cart items</h1>
            <a class="text-primaryGreen underline text-lg font-Roboto" href="{{ route('home') }}">Back to shopping</a>
        </div>
        <div class="flex justify-center ">
            <x-cart-product-table/>
        </div>
        <div class="flex py-10 gap-10 items-center justify-end font-Roboto">
            <div>
                <div class="font-medium text-lg flex justify-between">
                    <span class="w-text-end">Sub-total </span>
                    <span>$ 9.99</span>
                </div>

                <p class="text-[#656565] mt-4">
                    Tax and shipping cost will be calculated later
                </p>
            </div>
            <div>
                <x-button text="Checkout" link=""></x-button>
            </div>
        </div>
    </div>
@endsection
