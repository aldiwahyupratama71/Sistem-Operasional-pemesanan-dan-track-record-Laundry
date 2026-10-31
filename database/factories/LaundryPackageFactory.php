<?php

namespace Database\Factories;

use App\Models\LaundryPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LaundryPackage>
 */
class LaundryPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Cuci Kering', 'Express', 'Setrika Premium', 'Cuci Komplit']),
            'price' => fake()->randomElement([7000, 12000, 15000, 20000]),
            'unit' => fake()->randomElement(['kg', 'pcs']),
            'estimated_days' => fake()->numberBetween(1, 3),
            'description' => fake()->sentence(),
            'is_active' => true,
        ];
    }
}
