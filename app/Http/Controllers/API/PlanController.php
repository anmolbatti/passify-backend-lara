<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Plan\PlanPaymentRequest;
use App\Http\Traits\ApiResponse;
use App\Interfaces\PlanRepositoryInterface;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    use ApiResponse;

    private $planRepository;

    public function __construct(
        PlanRepositoryInterface $planRepositoryInterface
    ) {
        $this->planRepository = $planRepositoryInterface;
    }

    public function index()
    {
        $data = $this->planRepository->getAllPlans();
        if ($data) {
            return $this->success_response($data, "Plans");
        } else {
            return $this->fail_response("Something went wrong");
        }
    }

    public function show($id)
    {
        $data = $this->planRepository->getPlanById($id);
        if ($data) {
            return $this->success_response($data, "Plan");
        } else {
            return $this->fail_response("Something went wrong");
        }
    }

    public function payment(PlanPaymentRequest $request)
    {
        $plan = $this->planRepository->payment($request->all());
        if ($plan['status']) {
            $data = $plan['data'];
            $message = "The URL is provided Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $plan['error'];
            $message = "Something went wrong";
            return $this->fail_response($error);
        }
    }

    public function refund_check()
    {
        $plan = $this->planRepository->refund_check();
        if ($plan['status']) {
            $data = $plan['data'];
            $message = "The refend request has been sent to Paytabs.";
            return $this->success_response($data, $message);
        } else {
            $error = $plan['error'];
            $message = "Something went wrong";
            return $this->fail_response($error);
        }
    }
}
