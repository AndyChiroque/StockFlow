<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex gap-1 text-xl font-bold text-gray-800">
                <img src="{{ asset('images\icon-stockflow.svg') }}" alt="StockFlow" class="h-7 w-auto">
                {{-- {{ config('app.name') }} --}}
            </a>

            {{-- Links según autenticación y rol --}}
            <div class="flex items-center gap-4 text-sm">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900">Productos</a>
                    
                    {{-- Comentado por motivo de card en dashboard

                    @if (auth()->user()->isAdmin() || auth()->user()->isMid())
                        <a href="{{ route('products.create') }}"
                           class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                            + Nuevo
                        </a>
                    @endif

                    --}}

                    <span class="text-gray-400">|</span>
                    <span class="text-gray-500">{{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="group relative h-5 w-5 -m-3" title="Cerrar sesión">

                        <img src="{{ asset('images\logout-red-icon.svg') }}" alt="StockFlow" 
                        class="absolute inset-0 h-full w-full group-hover:hidden translate-y-[5px]">

                        <img src="{{ asset('images\logout-hover-icon.svg') }}" alt="StockFlow" 
                        class="absolute inset-0 h-full w-full hidden group-hover:block translate-y-[5px]">

                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Contenido de cada página --}}
    <main class="max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>