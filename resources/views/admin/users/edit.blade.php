@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Editar Usuario: {{ $user->name }}</h1>

    <div class="bg-white rounded-lg shadow p-6 max-w-lg">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Password (dejar vacío para mantener)</label>
                <input type="password" name="password"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Confirmar Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Rol</label>
                <select name="role" class="w-full border rounded px-3 py-2" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="mid" {{ old('role', $user->role) == 'mid' ? 'selected' : '' }}>Mid</option>
                    <option value="low" {{ old('role', $user->role) == 'low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>

            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                Actualizar
            </button>
            <a href="{{ route('admin.users.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
@endsection