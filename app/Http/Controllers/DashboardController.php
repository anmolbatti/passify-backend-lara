<?php

namespace App\Http\Controllers;

// use App\Http\Traits\ChangeLanguage;
use App\Models\Pass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class DashboardController extends Controller
{
    // use ChangeLanguage;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setLanguage');
    }

    public function index()
    {
        $passes = [];
        return view('dashboard', compact('passes'));
    }
}
