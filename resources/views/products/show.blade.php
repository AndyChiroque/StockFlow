@extends('layouts.app')

@section('title', $product->nombre)

@section('content')
    <div id="app">
        <product-detail
            :product='@json($product->load("user"))'
            back-url="{{ route('products.index') }}"
        ></product-detail>
    </div>
@endsection