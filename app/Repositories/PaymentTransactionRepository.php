<?php

namespace App\Repositories;

use App\Interfaces\PaymentTransactionRepositoryInterface;
use App\Models\PaymentTransaction;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PaymentTransactionRepository implements PaymentTransactionRepositoryInterface
{
    public function makePaid($plan_id,$user_id){
        $payment_transaction = PaymentTransaction::where('plan_id',$plan_id)->where('user_id',$user_id)->first();

        if($payment_transaction && $payment_transaction->is_paid){
            $payment_transaction->is_paid = true;
            return $payment_transaction->save();
        }
        else{
            return false;
        }
    }
    public function checkIsPaid($plan_id,$user_id){
        $payment_transaction = PaymentTransaction::where('plan_id',$plan_id)->where('user_id',$user_id)->first();

        if($payment_transaction && $payment_transaction->is_paid){
            return true;
        }
        else{
            return false;
        }
    }
    public function createTransaction($tran_ref,$plan_id,$user_id,$subscription_id, $tran_type){
        $plan = Plan::where('id',$plan_id)->first();
        $payment_transaction = PaymentTransaction::where('tran_ref',$tran_ref)->first();
        if(!$payment_transaction){
            return PaymentTransaction::create([
                'tran_ref' => $tran_ref,
                'plan_id' => $plan_id,
                'currency' => $plan->currency_symbol,
                'amount' => $plan->price,
                'user_id' => $user_id,
                'subscription_id' => $subscription_id,
                'tran_type' => $tran_type
            ]);
        }
        return true;
    }
}
