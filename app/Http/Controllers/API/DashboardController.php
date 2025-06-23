<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PassUser;
use Illuminate\Http\Request;
use App\Models\Pass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function home(){
        // get passes ids of the vendor
        // passusers wherein passed_ids
        $user = Auth::user();
        $user_id = $user->id;

        $total_customer =  User::where('is_sub_user', true)->where('parent_user', $user_id)->get();
        $passes = Pass::with('pass_users')->where('vendor_id',$user_id)->get();
        $passesIds = Pass::where('vendor_id',$user_id)->pluck('id');

        $recent_customers = PassUser::orderBy('created_at',"DESC")->whereIn('pass_id',$passesIds)->get(['name','email', DB::raw('created_at as last_visit')])->map(function ($user) {
            $user['initials'] = strtoupper(preg_replace('/[^A-Z]/', '', $user['name']));
            return $user;
        });


        $installs_to_wallet = PassUser::whereIn('pass_id',$passesIds)->where('deviceLibraryIdentifier',"!=", null )->where('pushToken','!=', null)->count();
        $uninstalled_from_wallet = PassUser::whereIn('pass_id',$passesIds)->where('deviceLibraryIdentifier',"!=", null )->where('pushToken','=', null)->count();
        $rewards_redeemed = PassUser::whereIn('pass_id',$passesIds)->sum('stamps_earned');

        $totalPassUsersCount = 0;

        foreach ($passes as $pass) {
            $totalPassUsersCount += $pass->pass_users->count();
        }

        $totalUniqueUsersCount = $passes->flatMap(function ($pass) {
            return $pass->pass_users->pluck('user_id')->unique();
        })->count();
        
        // return $passes;

        $unique_coupon_users = $totalUniqueUsersCount;
        $loyalty_visits = $totalPassUsersCount;

        // dd($totalUniqueUsersCount);
        // return $loyalty_visits;

        // TODO: currently dummy data
        $monthly_sales_data = [
            [
                "month" => "SEP",
                "amount" => "2000000"
            ],
            [
                "month" => "OCT",
                "amount" => "3100000"
            ],
            [
                "month" => "NOV",
                "amount" => "2180000"
            ],
            [
                "month" => "DEC",
                "amount" => "2200000"
            ]
        ];


        // Get the start of the current week (Monday)
        $startOfWeek = Carbon::now()->startOfWeek();

        // Modify the start of the week if today is Monday, as it's the start of the week
        if (Carbon::now()->dayOfWeek === Carbon::MONDAY) {
            $startOfWeek = Carbon::now();
        }

        // Adjust the time to the beginning of the day
        $startOfWeek->startOfDay();

        // Get the end of the week (Sunday)
        $endOfWeek = $startOfWeek->copy()->endOfWeek()->endOfDay();

        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

         // Initialize an empty array to store the result
        $weekGraphData = [];

    // Group the PassUser records by day of the week and count them for installs
    $installsWeekwallet = PassUser::whereIn('pass_id', $passesIds)
        ->where('deviceLibraryIdentifier', '!=', null)
        ->where('pushToken', '!=', null)
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('l');
        })
        ->map(function($grouped, $day) {
            $day = strtolower($day);
            $installCount = $grouped->count();
            return [
                "day" => $day,
                "install" => $installCount
            ];
        });

        // Group the PassUser records by day of the week and count them for uninstalls
        $uninstalledWeekwallet = PassUser::whereIn('pass_id', $passesIds)
            ->where('deviceLibraryIdentifier', '!=', null)
            ->where('pushToken', '=', null)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('l');
            })
            ->map(function($grouped, $day) {
                $day = strtolower($day);
                $uninstallCount = $grouped->count();
                return [
                    "day" => $day,
                    "Un-install" => $uninstallCount
                ];
            });

        foreach ($daysOfWeek as $day) {
            $install = $installsWeekwallet->firstWhere('day', $day);
            $uninstall = $uninstalledWeekwallet->firstWhere('day', $day);

            $installCount = isset($install['install']) ? $install['install'] : 0;
            $uninstallCount = isset($uninstall['Un-install']) ? $uninstall['Un-install'] : 0;
            $shortDay = substr($day, 0, 3);

            $weekGraphData[] = [
                "day" => $shortDay,
                "install" => $installCount,
                "Un-install" => $uninstallCount
            ];
        }

        $data = [
            'total_wallet_amount' => "SAR 100.00", // TODO: dummy data
            'total_redeemed' => "SAR 224.00", // TODO: dummy data
            'today_redeemed' => "SAR 444.00", // TODO: dummy data
            'loyalty_visits' => $loyalty_visits, // TODO: dummy data
            'unique_coupon_users' => $unique_coupon_users, // TODO: dummy data
            // 'monthly_sales_data' => $monthly_sales_data,
            'recent_customers' => $recent_customers,
            'total_customer' => count($total_customer),
            'installs_to_wallet' => $installs_to_wallet,
            'uninstalled_from_wallet' => $uninstalled_from_wallet,
            'rewards_redeemed' => $rewards_redeemed,
            'weekGraphData' => $weekGraphData,
        ];


        return ['status' => true, 'data' => $data];

    }
}