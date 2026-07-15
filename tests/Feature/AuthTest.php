<?php

use App\Models\User;

test('unregistered user can see register page', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('user can register with valid data', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'low',
    ]);

    $response->assertRedirect('/dashboard');

    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
    ]);

    $this->assertTrue(auth()->check());
});

test('user cannot register with duplicate email', function () {
    User::factory()->create(['email' => 'existing@example.com']);

    $response = $this->post('/register', [
        'name' => 'Another User',
        'email' => 'existing@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'low',
    ]);

    $response->assertSessionHasErrors('email');
});

test('user can login with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/login', [
        'email' => 'user@example.com',
        'password' => 'password',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertTrue(auth()->check());
});

test('user cannot login with wrong password', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => bcrypt('correct-password'),
    ]);

    $response = $this->post('/login', [
        'email' => 'user@example.com',
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors('email');
    $this->assertFalse(auth()->check());
});