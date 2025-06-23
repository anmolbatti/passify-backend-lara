<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use App\Models\Subscription;
use App\Models\SupportEnquiry;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select("id", "name", "email", "phone", "organization_name", "is_sub_user", "parent_user")->withCount('children')->where('role', 'user')->where('is_sub_user', false)->latest()->get();
        return view('admin-v2.users', compact('users'));
    }

    public function view($id)
    {
        $user = User::with('subscription.plan', 'children')->findOrFail($id);
        return view('admin-v2.user-view', compact('user'));
    }

    public function subscription_histories()
    {
        $histories = Subscription::with('user:name,id,email', 'plan:plan_name,id,plan_type')->latest()->get();

        return view('admin-v2.subscription_history', compact('histories'));
    }

    public function payment_history()
    {
        $histories = PaymentTransaction::with('plan:plan_name,id,plan_type', 'user:name,id')->latest()->get();

        return view('admin-v2.transaction_history', compact('histories'));
    }

    public function enquires()
    {
        $enquiries = SupportEnquiry::latest()->get();

        return view('admin-v2.support_enquiry', compact('enquiries'));
    }
}
