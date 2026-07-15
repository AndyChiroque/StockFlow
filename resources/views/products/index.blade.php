@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Productos</h1>

    <div id="app">
    <product-list
        :products='@json($products)'
        :routes='@json($routes)'
        :can-edit="{{ auth()->user()->isAdmin() || auth()->user()->isMid() ? 'true' : 'false' }}"
        :can-delete="{{ auth()->user()->isAdmin() ? 'true' : 'false' }}"
        flash-message="{{ session('success') }}"
        csrf="{{ csrf_token() }}"
    ></product-list>
    </div>
@endsection