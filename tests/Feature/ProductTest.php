<?php

use App\Models\Product;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => 'admin']);
    $this->mid = User::factory()->create(['role' => 'mid']);
    $this->low = User::factory()->create(['role' => 'low']);

    $this->product = Product::factory()->create([
        'user_id' => $this->admin->id,
    ]);
});

// LISTAR
test('admin can list products', function () {
    $this->actingAs($this->admin)
        ->get('/products')
        ->assertStatus(200);
});

test('mid can list products', function () {
    $this->actingAs($this->mid)
        ->get('/products')
        ->assertStatus(200);
});

test('low can list products', function () {
    $this->actingAs($this->low)
        ->get('/products')
        ->assertStatus(200);
});

// CREAR
test('admin can access create form', function () {
    $this->actingAs($this->admin)
        ->get('/products/create')
        ->assertStatus(200);
});

test('mid can access create form', function () {
    $this->actingAs($this->mid)
        ->get('/products/create')
        ->assertStatus(200);
});

test('low cannot access create form', function () {
    $this->actingAs($this->low)
        ->get('/products/create')
        ->assertForbidden();
});

// EDITAR
test('admin can access edit form', function () {
    $this->actingAs($this->admin)
        ->get("/products/{$this->product->id}/edit")
        ->assertStatus(200);
});

test('mid can access edit form', function () {
    $this->actingAs($this->mid)
        ->get("/products/{$this->product->id}/edit")
        ->assertStatus(200);
});

test('low cannot access edit form', function () {
    $this->actingAs($this->low)
        ->get("/products/{$this->product->id}/edit")
        ->assertForbidden();
});

// ELIMINAR
test('admin can delete product', function () {
    $this->actingAs($this->admin)
        ->delete("/products/{$this->product->id}")
        ->assertRedirect('/products');
});

test('mid cannot delete product', function () {
    $this->actingAs($this->mid)
        ->delete("/products/{$this->product->id}")
        ->assertForbidden();
});

test('low cannot delete product', function () {
    $this->actingAs($this->low)
        ->delete("/products/{$this->product->id}")
        ->assertForbidden();
});