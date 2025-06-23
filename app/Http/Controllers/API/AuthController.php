<?php

namespace App\Http\Controllers\API;

use App\Events\CustomEmailVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\APIPasswordChangeRequest;
use App\Http\Requests\API\APIReadByIdRequest;
use App\Http\Requests\API\ChangeLanguageAPIRequest;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\ResetPasswordAPIRequest;
use App\Http\Requests\API\SignUpAPIRequest;
use App\Http\Requests\UpdateForgotPasswordRequest;
use App\Http\Traits\ApiResponse;
use App\Interfaces\API\AuthRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Mail\welocmeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponse;
    use HasApiTokens;

    private $user_repository;
    private $auth_repository;

    public function __construct(UserRepositoryInterface $user_repository, AuthRepositoryInterface $auth_repository)
    {
        $this->user_repository = $user_repository;
        $this->auth_repository = $auth_repository;
    }

    public function login(LoginRequest $request)
    {
        $userCheck = User::where('email', $request->email)->first();
        if ($userCheck) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = User::where('email', $request->email)->select('id', 'name', 'email')->first();
                // if($user->email_verified_at){
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return $this->login_success_response($token, $user);
                // }
                // else{
                //     return $this->fail_response('Verify your mail first');
                // }
            } else {
                return $this->fail_response('Credentials not matched');
            }
        } else {
            return $this->fail_response('Account does not exist');
        }
    }

    public function register(SignUpAPIRequest $request)
    {
        $user = $this->user_repository->createUser(
            $request->name,
            $request->email,
            $request->password,
            $request->organization_name,
            $request->phone,
            $request->language,
            $request->organization_phone
        );

        Mail::to($request->email)->send(new welocmeMail($request->name, $request->language));

        // return $user;
        // $user->sendEmailVerificationNotification();
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $message = 'User have been registered Successfully';

        return $this->register_user_success_response($token, $user, $message);
    }

    public function verifyEmail(Request $request)
    {
        $user = User::findOrFail($request->id);
        if (!hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
            return $this->fail_response('Email verification failed');
            // return response()->json(['message' => 'Email verification failed'], 403);
        }
        if ($user->hasVerifiedEmail()) {
            return $this->fail_response('Email already verified.');
            // return response()->json(['message' => 'Email already verified'], 200);
        }
        $user->markEmailAsVerified();
        return redirect()->route('login');
        // return $this->success_response('','Email has been verified Successfully.');
        // return response()->json(['message' => 'Email verified successfully'], 200);
    }


    public function changeLanguage(ChangeLanguageAPIRequest $request)
    {
        $user_data = Auth::user();
        $user_id = $user_data->id;
        $user = $this->auth_repository->changeLanguage([
            'data' => $request->all(),
            'user_id' => $user_id
        ]);
        if ($user['status']) {
            $data = $user['data'];
            $message = "The language of user have been updated Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            $this->fail_response($message);
        }
    }

    public function forgetPassword(ResetPasswordAPIRequest $request)
    {

        $status = Password::sendResetLink(
            $request->only('email')
        );

        $msg = [
            'reset' => 'Your password has been reset.',
            'sent' => 'We have emailed your password reset link.',
            'throttled' => 'Please wait before retrying.',
            'token' => 'This password reset token is invalid.',
            'user' => "We can't find a user with that email address.",
        ];


        if ($status == Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => $msg['sent']
            ], 200);
        }
        $status = str_replace("passwords.", "", $status);

        throw ValidationException::withMessages([
            'email' => $msg[$status],
        ]);
    }

    public function delete()
    {
        $user = $this->auth_repository->delete();
        // return $user;
        if ($user['status']) {
            $data = $user['data'];
            $message = "The User has been deleted Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function readById(APIReadByIdRequest $request)
    {
        $user = $this->auth_repository->readById($request->all());
        if ($user['status']) {
            $data = $user['data'];
            $message = "The information of user is provided Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }

    public function getUserInfo()
    {
        $user = $this->auth_repository->getUserInfo();

        if ($user['status']) {
            $data = $user['data'];
            $message = "The information of user is provided Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            return $this->fail_response($message);
        }
    }



    public function updatePassword(APIPasswordChangeRequest $request)
    {
        $user = $this->auth_repository->updatePassword($request->all());
        if ($user['status']) {
            $data = $user['data'];
            $message = "User password has been updated Successfully.";
            return $this->success_response($data, $message);
        } else {
            $error = $user['error'];
            $message = "Something went wrong";
            return $this->fail_response($error);
        }
    }

    public function updateForgotPassword(UpdateForgotPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );


        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('password.success');
        }

        $msg = [
            'reset' => 'Your password has been reset.',
            'sent' => 'We have emailed your password reset link.',
            'throttled' => 'Please wait before retrying.',
            'token' => 'This password reset token is invalid.',
            'user' => "We can't find a user with that email address.",
        ];

        $status = str_replace("passwords.", "", $status);

        throw ValidationException::withMessages([
            'email' => $msg[$status],
        ]);
    }
}
