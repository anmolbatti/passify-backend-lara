<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $plan = Plan::where('plan_name','Pro')->first();
        foreach($users as $user){
            Subscription::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'expire_at' => Carbon::now()->addMonths(3)
            ]);
        }
    }
}
