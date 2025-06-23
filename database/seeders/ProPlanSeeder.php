<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // monthly plan
        Plan::create([
            'plan_name' => 'Pro',
            'price' => '85',
            'currency_symbol' => 'SAR',
            'plan_type' => 'monthly',
            'trial_period_in_days' => '30',
            'card_design_count' => '10',
            'location_count' => '10',
            'user_count' => '50',
            'card_redesign_annual_count' => '0',
            'is_notification_on' => true,
            'exportable' => true
        ]);

        // annual plan
        Plan::create([
            'plan_name' => 'Pro',
            'price' => '920',
            'currency_symbol' => 'SAR',
            'plan_type' => 'annual',
            'trial_period_in_days' => '30',
            'card_design_count' => '10',
            'location_count' => '10',
            'user_count' => '50',
            'card_redesign_annual_count' => '0',
            'is_notification_on' => true,
            'exportable' => true
        ]);
    }
}
