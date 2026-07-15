@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Crear Usuario</h1>

    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
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

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Rol</label>
                <select name="role" class="w-full border rounded px-3 py-2" required>
                    <option value="">Selecciona un rol</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin - Acceso total</option>
                    <option value="mid" {{ old('role') == 'mid' ? 'selected' : '' }}>Mid - Crear, ver y editar</option>
                    <option value="low" {{ old('role') == 'low' ? 'selected' : '' }}>Low - Solo ver</option>
                </select>
            </div>

            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Crear Usuario
            </button>
            <a href="{{ route('admin.users.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
@endsection