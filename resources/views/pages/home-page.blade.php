@extends('components.layouts.app')

<?php $slot = ''?>

@section('content')
    <div class="h-full">
        @include('discovery-collection-section')
        <div class="max-w-2xl mt-16 lg:max-w-7xl mx-auto">
            @include('products-section')
        </div>

        <div class="bg-[#F7F8FA] lg:pt-[130px] lg:pb-[234px]">
            <div class="max-w-2xl mt-16 lg:max-w-7xl mx-auto">
                @include('learn-more-section')
            </div>
        </div>
    </div>
@endsection
