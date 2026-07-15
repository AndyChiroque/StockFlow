<?php

use App\Models\User;

test('admin user returns true for isAdmin', function () {
    $user = User::factory()->create(['role' => 'admin']);

    expect($user->isAdmin())->toBeTrue();
    expect($user->isMid())->toBeFalse();
    expect($user->isLow())->toBeFalse();
});

test('mid user returns true for isMid', function () {
    $user = User::factory()->create(['role' => 'mid']);

    expect($user->isMid())->toBeTrue();
    expect($user->isAdmin())->toBeFalse();
    expect($user->isLow())->toBeFalse();
});

test('low user returns true for isLow', function () {
    $user = User::factory()->create(['role' => 'low']);

    expect($user->isLow())->toBeTrue();
    expect($user->isAdmin())->toBeFalse();
    expect($user->isMid())->toBeFalse();
});