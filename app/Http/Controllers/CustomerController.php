<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setLanguage');
    }

    public function create($id = null)
    {
        return view('loyality.customer_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->withSuccess('completed');
    }

    public function view($id)
    {
        $cst = Customer::find($id);
        return view('loyality.customer_edit', compact('cst'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $customer = Customer::find($id);

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->withSuccess('updated');
    }
}
