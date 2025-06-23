<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarterPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // monthly plan
        Plan::create([
            'plan_name' => 'Starter',
            'price' => '23',
            'currency_symbol' => 'SAR',
            'plan_type' => 'monthly',
            'trial_period_in_days' => '30',
            'card_design_count' => '2',
            'location_count' => '1',
            'user_count' => '3'
        ]);

        // annual plan
        Plan::create([
            'plan_name' => 'Starter',
            'price' => '226',
            'currency_symbol' => 'SAR',
            'plan_type' => 'annual',
            'trial_period_in_days' => '30',
            'card_design_count' => '2',
            'location_count' => '1',
            'user_count' => '3'
        ]);
    }
}
