<?php

namespace App\Interfaces;

interface SubscriptionRepositoryInterface
{
    public function createSubscription($user_id, $plan_id);
    public function activateStatus($user_id, $plan_id);
    public function deactivateStatus($user_id, $plan_id);
}
