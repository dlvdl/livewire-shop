@extends('components.layouts.app')

<?php $slot = ''?>

@section('content')
    <div class="h-full">
        @include('discovery-collection-section')
        <div class="max-w-2xl mt-16 lg:max-w-7xl mx-auto">
            @include('products-section', ['products' => $products])
        </div>

        <div class="bg-[#F7F8FA] lg:pt-[130px] lg:pb-[130px]">
            <div class="max-w-2xl mt-16 lg:max-w-7xl mx-auto">
                @include('learn-more-section')
            </div>
        </div>

        <div class="bg-primaryGreen bg-opacity-10 lg:pt-[90px] lg:pb-[60px]">
            <div class="max-w-2xl mt-16 lg:max-w-7xl mx-auto">
                @include('testimonials-section')
            </div>
        </div>

        <div class="max-w-2xl pt-[90px] lg:max-w-7xl mx-auto">
            @include('popular-section', ['products' => $popularProducts])
        </div>
    </div>
@endsection
