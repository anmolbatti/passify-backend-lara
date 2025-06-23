<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setLanguage');
    }

    public function index()
    {
        $user = auth()->user();
        $name = $user->name;
        $email = $user->email;
        $phone = $user->phone;
        $street1 = $user->address ?? 'New Jercey';
        $city = $user->city ?? 'City';
        $state = 'NA';
        $country = 'KSA';
        $same_as_billing = true;
        $zip = 12345;
        $ip = request()->ip();

        paypage::sendPaymentCode('all')->sendTransaction('sale')->create_pay_page();
        // return view('payment.index');
    }

    public function makePayment(Request $request)
    {
        // dd($request->all());
        return true;
    }
}
