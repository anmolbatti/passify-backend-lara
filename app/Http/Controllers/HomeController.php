<?php

namespace App\Http\Controllers;

use App\Mail\MadaPolicyMail;
use App\Mail\SupportMail;
use App\Models\Plan;
use App\Models\SupportEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('localLang');
    }

    public function welcome()
    {
        $plans = Plan::where('status', true)->where('plan_type', 'monthly')->get();
        return view('welcome')->with('plans', $plans);
    }
    public function faq()
    {
        return view('faq');
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function cookies()
    {
        return view('cookies');
    }

    public function helpPage()
    {
        return view('help');
    }

    public function solutions()
    {
        return view('solutions');
    }

    public function pricing($type = null)
    {
        return view('pricing');
    }

    public function setlang($lang)
    {
        cookie()->forget('lang');
        $cookie = cookie('lang', $lang, 525600); // for an year
        return redirect()->back()->withCookie($cookie);
    }

    public function sendSupportMail(Request $request)
    {
        $data = $request->all();
        $data['message'] = $data['msg'];
        Mail::to('support@passify.info')->send(new SupportMail($data));
        $quiry = new SupportEnquiry();
        $quiry->fill($data);
        $quiry->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function login()
    {
        return redirect()->to('https://app.passify.info');
    }

    public function register()
    {
        return redirect()->to('https://app.passify.info/register');
    }

    public function successPage()
    {
        return view('auth.success');
    }
}
