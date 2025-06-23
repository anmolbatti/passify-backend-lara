<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Pass;
use App\Models\PassUser;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect(route('admin.dashboard'));
        }
        return view('admin.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        $users = User::select('name', 'created_at', 'organization_name')->where('role', 'user')->where('is_sub_user', false)->latest()->limit(5)->get();
        $usersCount = User::where('role', 'user')->where('is_sub_user', false)->count();

        $passes = Pass::count();
        $enquires = 0;
        $passUsers = PassUser::count();

        $count = [
            'users' => $usersCount,
            'passes' => $passes,
            'enquiry' => $enquires,
            'passUsers' => $passUsers

        ];

        $currentMonth = Carbon::now()->format('F');
        $currentYear = Carbon::now()->format('Y');

        $months = [];
        for ($i = 5; $i >= 1; $i--) {
            $months[] = Carbon::now()->subMonths($i)->format('F Y');
        }
        $months[] = $currentMonth . ' ' . $currentYear;
        $userCount = collect($months)->map(function ($month) use ($currentYear) {
            $usersInMonth = User::where("role", 'user')->where('is_sub_user', false)->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', Carbon::parse($month)->month)
                ->count();

            return [
                $month => $usersInMonth
            ];
        })->flatten()->toArray();

        $passInstallsCount = collect($months)->map(function ($month) use ($currentYear) {
            $usersInMonth = PassUser::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', Carbon::parse($month)->month)
                ->count();

            return [
                $month => $usersInMonth
            ];
        })->flatten()->toArray();

        $chartData = [
            'users' => $userCount,
            'passInstalls' => $passInstallsCount,
        ];

        return view('admin-v2.dashboard', compact('count', 'months', 'chartData', 'users'));
    }
}
