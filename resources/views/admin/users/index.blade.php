@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Usuarios</h1>
        <a href="{{ route('admin.users.create') }}"
           class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
            + Nuevo
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm">Email</th>
                    <th class="px-4 py-3 text-left text-sm">Rol</th>
                    <th class="px-4 py-3 text-left text-sm">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-xs font-medium
                                @if($user->role === 'admin') bg-red-100 text-red-800
                                @elseif($user->role === 'mid') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline"
                                        onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection