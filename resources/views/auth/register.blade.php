<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

        <h1 class="text-2xl font-bold mb-6 text-center">Crear Cuenta</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Confirmar Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Registrarse
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-green-600 hover:underline">Inicia sesión</a>
        </p>
    </div>
</body>
</html>