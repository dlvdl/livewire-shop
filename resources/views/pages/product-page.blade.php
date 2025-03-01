@extends('components.layouts.app')

<?php $slot = ''?>

@props([
    'product'
])

@section('content')
    <div class="h-full text-primaryBlack max-w-2xl mt-16 lg:max-w-7xl mx-auto py-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 px-4">
            <div class="h-full flex flex-col">
                <img class="object-contain w-full" src="{{ asset($product->galleryImage->url) }}"/>

                <p class="font-medium font-Poppins text-2xl text-center mb-4 leading-6 tracking-tight">
                    All hand-made with natural soy wax,
                    Candleaf is made for your pleasure moments.
                </p>

                <p class="text-xl font-Roboto font-medium text-primaryGreen uppercase text-center">
                    🚚 FREE SHIPPING
                </p>
            </div>
            <div class="h-full">
                <livewire:product-page-form :product="$product"/>
            </div>
        </div>
    </div>
@endsection
