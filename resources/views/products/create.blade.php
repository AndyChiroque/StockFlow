@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Nuevo Producto</h1>

    <div id="app">
    <product-form
        :product="null"
        action-url="{{ route('products.store') }}"
        back-url="{{ route('products.index') }}"
        :errors='@json($errors->toArray())'
        csrf="{{ csrf_token() }}"
    ></product-form>
    </div>
@endsection