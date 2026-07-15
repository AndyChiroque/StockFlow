@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
    <div id="app">
    <h1 class="text-2xl font-bold mb-4">Editar Producto</h1>
    <product-form
        :product='@json($product)'
        action-url="{{ route('products.update', $product) }}"
        back-url="{{ route('products.index') }}"
        :errors='@json($errors->toArray())'
        csrf="{{ csrf_token() }}"
    ></product-form>
    </div>
@endsection