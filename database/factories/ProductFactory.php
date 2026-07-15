<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => fake()->words(3, true),
            'descripcion' => fake()->sentence(),
            'precio' => fake()->randomFloat(2, 10, 1000),
            'stock' => fake()->numberBetween(0, 100),
            'categoria' => fake()->randomElement(['Tecnología', 'Accesorios', 'Audio', 'Componentes']),
            'imagen' => fake()->optional()->imageUrl(),
            'user_id' => User::factory(),
        ];
    }
}
