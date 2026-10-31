<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\LaundryPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $package = LaundryPackage::inRandomOrder()->first() ?? LaundryPackage::factory()->create();

        $entryDate = fake()->dateTimeBetween('-2 weeks', 'now');
        $status = fake()->randomElement(['pending', 'washing', 'drying', 'ironing', 'done', 'picked_up']);
        
        $finishDate = null;
        if (in_array($status, ['done', 'picked_up'])) {
            $finishDate = (clone $entryDate)->modify('+' . $package->estimated_days . ' days');
        }

        return [
            'customer_id' => Customer::factory(),
            'laundry_package_id' => $package->id,
            'weight' => fake()->randomFloat(1, 1, 10),
            'price' => $package->price,
            'status' => $status,
            'payment_status' => fake()->randomElement(['unpaid', 'paid']),
            'entry_date' => $entryDate->format('Y-m-d'),
            'finish_date' => $finishDate ? $finishDate->format('Y-m-d') : null,
            'notes' => fake()->boolean(40) ? fake()->sentence() : null,
        ];
    }
}
