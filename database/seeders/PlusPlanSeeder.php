<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlusPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // monthly plan
        Plan::create([
            'plan_name' => 'Plus',
            'price' => '60',
            'currency_symbol' => 'SAR',
            'plan_type' => 'monthly',
            'trial_period_in_days' => '30',
            'card_design_count' => '5',
            'location_count' => '3',
            'user_count' => '10',
            'card_redesign_annual_count' => '2',
            'exportable' => true
        ]);

        // annual plan
        Plan::create([
            'plan_name' => 'Plus',
            'price' => '620',
            'currency_symbol' => 'SAR',
            'plan_type' => 'annual',
            'trial_period_in_days' => '30',
            'card_design_count' => '5',
            'location_count' => '3',
            'user_count' => '10',
            'card_redesign_annual_count' => '2',
            'exportable' => true
        ]);
    }
}
