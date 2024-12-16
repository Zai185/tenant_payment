<?php

namespace Database\Factories;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::inRandomOrder()->first()->id,
            'expire_at' => Carbon::today()->addDays(rand(-20,365)),
            'status' => rand(0,3),
            'payment' => 'COD',
            'subscription_code' => uniqid()
        ];
    }
}
