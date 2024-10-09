@extends('components.layouts.app')

<?php $slot = ''?>

@section('content')
    <div class="h-full">
        @include('discovery-collection-section')
        @include('products-section')
    </div>
@endsection
