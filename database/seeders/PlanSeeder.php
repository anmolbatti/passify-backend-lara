<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(StarterPlanSeeder::class);
        $this->call(PlusPlanSeeder::class);
        $this->call(ProPlanSeeder::class);
    }
}
