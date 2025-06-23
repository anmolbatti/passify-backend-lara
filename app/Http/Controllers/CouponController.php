<?php

namespace App\Http\Controllers;

use App\Models\AppleData;
use App\Models\Pass;
use App\Models\PassUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'manage'
        ]);

        $this->middleware('setLanguage');
    }

    public function manage($id)
    {
        // get passe ids for current vendor
        $passes = Pass::where('vendor_id', Auth::user()->id)->pluck('id');

        $installs_to_wallet = PassUser::where('deviceLibraryIdentifier', "!=", null)->where('pushToken', '!=', null)->count();
        $Uninstalled_from_wallet = PassUser::where('deviceLibraryIdentifier', "!=", null)->where('pushToken', '=', null)->count();
        $Rewards_redeemed = PassUser::sum('stamps_earned');

        $passUsers = PassUser::wherein('pass_id', $passes)->get();
        return view('loyality.singleView', compact('passUsers', 'id', 'installs_to_wallet', 'Uninstalled_from_wallet', 'Rewards_redeemed'));
    }

    public function delete($id)
    {
        $passUsers = Pass::where('id', $id)->first()->delete();
        return redirect()->back();
    }

    public function generateCard($id)
    {
        return view('loyality.customer_create')->with('id', $id);
    }

    public function storeAppleData(Request $request)
    {
        AppleData::create([
            'data' => json_encode($request->all())
        ]);

        return true;
    }
}
