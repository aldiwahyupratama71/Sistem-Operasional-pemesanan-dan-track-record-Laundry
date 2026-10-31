<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->unique()->numerify('08##########'),
            'address' => fake()->address(),
            'email' => fake()->safeEmail(),
            'birth_date' => fake()->date('Y-m-d', '-18 years'),
            'gender' => fake()->randomElement(['male', 'female']),
            'member' => fake()->boolean(30),
            'point' => fake()->numberBetween(0, 100),
        ];
    }
}
