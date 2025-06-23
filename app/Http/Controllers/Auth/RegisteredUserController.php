<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Mail\welocmeMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required',
            'language' => 'required',
            'organization_phone' => 'required'
        ]);

        $user = $this->userRepository->createUser(
            $request->name,
            $request->email,
            $request->password,
            $request->organization_name,
            $request->phone,
            $request->language,
            $request->organization_phone
        );

        event(new Registered($user));

        // Mail::to($request->email)->send(new welocmeMail($request->name));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    public function changeLanguage(Request $request){
        if($request->language != null && $request->language != ""){
            $user = $this->userRepository->changeLanguage($request->all());
            return redirect()->back()->with('success', 'Language changed successfully.');
        }
        else{
            return redirect()->back()->with('danger', 'Select Language First.');
        }
    }
}
