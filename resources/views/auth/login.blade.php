<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <h1 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h1>

        {{-- Errores de validación (email/password vacíos, credenciales mal) --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf   {{-- Token obligatorio contra CSRF --}}

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"    {{-- Rellena el campo si hay error --}}
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Iniciar Sesión
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate</a>
        </p>
    </div>
</body>
</html>