<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ProductController;     
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


// Página principal
Route::get('/', function () {
    return auth()->check()
    ? redirect()->route('dashboard')
    : redirect()->route('login');
});

// Rutas para invitados (sin sesión iniciada)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rutas para usuarios autenticados
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // Crear: admin y mid
    Route::middleware('role:admin,mid')->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    });

    // Editar: admin y mid
    Route::middleware('role:admin,mid')->group(function () {
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    });
    // eliminar: solo admin
    Route::middleware('role:admin')->group(function () {
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // Admin: gestión de usuarios
    Route::middleware('role:admin')->prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/', [AdminController::class, 'store'])->name('store');
    Route::get('/{user}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{user}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{user}', [AdminController::class, 'destroy'])->name('destroy');
    });

    //Todos los roles pueden ver

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Listar: todos los roles
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

   
    });