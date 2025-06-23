<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return view('admin-v2.membership', compact('plans'));
    }

    function changeStatus(Request $request, $id)
    {
        $membership = Plan::find($id);

        if ($membership) {
            $status = $request->status == 'approve' ? 1 : 0;
            $membership->status = $status;
            $membership->push();

            return response()->json([
                'status' => 'true',
                'message' => 'Success'
            ]);
        }

        return response()->json([
            'status' => 'false',
            'message' => 'something went wrong'
        ], 422);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gte:0',
            'trial_period_in_days' => 'required|numeric|gte:0',
            'card_design_count' => 'required|numeric|gt:0',
            'location_count' => 'required|numeric|gt:0',
            'sub_user_count' => 'required|numeric|gt:0',
            'notification_user_count' => 'required|numeric|gt:0',
        ]);

        try {
            DB::beginTransaction();

            Plan::create([
                'plan_name' => $request->name,
                'price' => $request->price,
                'currency_symbol' => 'SAR',
                'plan_type' => $request->plan_type,
                'trial_period_in_days' => $request->trial_period_in_days,
                'card_design_count' => $request->card_design_count,
                'location_count' => $request->location_count,
                'user_count' => $request->sub_user_count,
                'exportable' => $request->exportable,
                'status' => $request->status,
                'notification_users_count' => $request->notification_user_count
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Plan Successfully created'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function edit(Plan $plan)
    {
        $view = view('admin-v2.update-plan', compact('plan'));

        return response()->json([
            'status' => true,
            'data' => $view->render()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gte:0',
            'trial_period_in_days' => 'required|numeric|gte:0',
            'card_design_count' => 'required|numeric|gt:0',
            'location_count' => 'required|numeric|gt:0',
            'sub_user_count' => 'required|numeric|gt:0',
            'notification_user_count' => 'required|numeric|gt:0',
        ]);

        try {
            DB::beginTransaction();

            $plan = Plan::find($id);

            $plan->update([
                'plan_name' => $request->name,
                'price' => $request->price,
                'currency_symbol' => 'SAR',
                'plan_type' => $request->plan_type,
                'trial_period_in_days' => $request->trial_period_in_days,
                'card_design_count' => $request->card_design_count,
                'location_count' => $request->location_count,
                'user_count' => $request->sub_user_count,
                'exportable' => $request->exportable,
                'status' => $request->status,
                'notification_users_count' => $request->notification_user_count
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Plan Successfully updated'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Server Error',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
