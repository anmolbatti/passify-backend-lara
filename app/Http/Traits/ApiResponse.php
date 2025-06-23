<?php
namespace App\Http\Traits;

trait ApiResponse{
    public function login_success_response($token,$user)
    {
        return response([
            'status' => 'success',
            'message' => 'Login successful',
            'token' => $token,
            'userData' => $user,

        ],200);
    }

    public function register_user_success_response($token,$user,$message)
    {
        return response([
            'status' => 'success',
            'message' => $message,
            'token' => $token,
            'userData' => $user,

        ],200);
    }

    public function success_response($data ,$message)
    {
        return response([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ],200);
    }

    public function fail_response($message,$statusCode = 200)
    {
        return response([
            'status' => 'error',
            'message' => $message,
            'data' => [],

        ], $statusCode);
    }
}
