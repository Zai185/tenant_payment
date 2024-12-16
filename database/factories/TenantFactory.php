<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = [ 'running', 'stopped'];
        return [
            'name' => fake()->company(),
            'domain_name' => fake()->domainName(),
            'status' => rand(0, 1)
        ];
    }
}
