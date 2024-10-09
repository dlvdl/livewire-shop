@extends('components.layouts.app')

<?php $slot = ''?>

@section('content')
    <div class="h-full">
        @include('discovery-collection-section')
        <div class="max-w-2xl mt-16 lg:max-w-7xl mx-auto">
            @include('products-section')
        </div>
    </div>
@endsection
