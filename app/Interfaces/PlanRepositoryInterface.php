<?php

namespace App\Interfaces;

interface PlanRepositoryInterface
{
    public function getAllPlans();
    public function getPlanById($id);
    public function payment(array $data);
    public function refund_check();
}
