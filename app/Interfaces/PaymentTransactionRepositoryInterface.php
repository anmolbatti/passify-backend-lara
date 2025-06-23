<?php

namespace App\Interfaces;

interface PaymentTransactionRepositoryInterface
{
    public function checkIsPaid($plan_id,$user_id);
    public function makePaid($plan_id,$user_id);
    public function createTransaction($tran_ref,$plan_id,$user_id,$subscription_id, $tran_type);
}
