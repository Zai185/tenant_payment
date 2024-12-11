<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
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
            'price' => rand(1,8) * 10000,
            'duration' => rand(3,5),
            'max_users' => rand(10,20),
            'max_products' => rand(10,20),
            'max_invoices' => rand(10,20),
        ];
    }
}
