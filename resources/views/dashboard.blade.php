@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-2">Bienvenido, {{ auth()->user()->name }}</h1>

        {{-- <p class="text-gray-600 mb-6">Rol: <strong>{{ auth()->user()->role }}</strong></p> --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            {{-- Todos los roles --}}
            <a href="{{ route('products.index') }}"
               class="bg-blue-50 border border-blue-200 rounded-lg p-4 hover:bg-blue-100">
                <h3 class="font-semibold text-blue-800">Productos</h3>
                <p class="text-sm text-blue-600">Ver lista de productos</p>
            </a>

            {{-- Admin y Mid --}}
            @if (auth()->user()->isAdmin() || auth()->user()->isMid())
                <a href="{{ route('products.create') }}"
                   class="bg-green-50 border border-green-200 rounded-lg p-4 hover:bg-green-100">
                    <h3 class="font-semibold text-green-800">Nuevo Producto</h3>
                    <p class="text-sm text-green-600">Crear un producto</p>
                </a>
            @endif

            {{-- Solo Admin

            @if (auth()->user()->isAdmin())
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                    <h3 class="font-semibold text-purple-800">Administración</h3>
                    <p class="text-sm text-purple-600">Acceso total al sistema</p>
                </div>
            @endif

            --}}

            {{-- Solo Admin: Crear Usuarios --}}
            @if (auth()->user()->isAdmin())
                <a href="{{ route('admin.users.index') }}"
                class="bg-red-50 border border-red-200 rounded-lg p-4 hover:bg-red-100">
                    <h3 class="font-semibold text-red-800">Usuarios</h3>
                    <p class="text-sm text-red-600">Gestionar usuarios del sistema</p>
                </a>
            @endif
        </div>
    </div>
@endsection