<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User for Filament login
        User::factory()->create([
            'name' => 'Admin Laundry',
            'email' => 'admin@laundryku.com',
            'password' => bcrypt('admin123'),
        ]);

        // Create core laundry packages
        $packages = [
            [
                'name' => 'Regular',
                'price' => 7000,
                'unit' => 'kg',
                'estimated_days' => 2,
                'description' => 'Cuci bersih + kering + setrika rapi. Cocok untuk kebutuhan mingguan.',
                'is_active' => true,
            ],
            [
                'name' => 'Express',
                'price' => 12000,
                'unit' => 'kg',
                'estimated_days' => 1,
                'description' => 'Cuci kering setrika kilat. Selesai dalam waktu 3-5 jam.',
                'is_active' => true,
            ],
            [
                'name' => 'Premium',
                'price' => 20000,
                'unit' => 'kg',
                'estimated_days' => 1,
                'description' => 'Perawatan khusus untuk pakaian branded. Menggunakan parfum premium dan setrika uap.',
                'is_active' => true,
            ],
        ];

        foreach ($packages as $pkg) {
            \App\Models\LaundryPackage::create($pkg);
        }

        // Create 8 Customers
        $customers = \App\Models\Customer::factory(8)->create();

        // Create 15 Transactions using the generated customers and packages
        \App\Models\Transaction::factory(15)->create();
    }
}
