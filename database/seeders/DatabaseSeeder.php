<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\FeaturePackage;
use App\Models\Package;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Package::factory(3)->create();
        $features = ["Delivery", "E-commerce", "POS", "Warehouse Management", "WooCommerce", "Business"];

        foreach ($features as $feature) {
            Feature::create([
                'name' => $feature
            ]);
        }

        $feature_packages = [
            [1, 1],
            [1, 2],
            [1, 3],

            [2, 1],
            [2, 2],
            [2, 3],
            [2, 4],

            [3, 1],
            [3, 2],
            [3, 3],
            [3, 4],
            [3, 5],
            [3, 6],

        ];

        foreach ($feature_packages as $fp) {
            FeaturePackage::create([
                'package_id' => $fp[0],
                'feature_id' => $fp[1]
            ]);
        }
    }
}
