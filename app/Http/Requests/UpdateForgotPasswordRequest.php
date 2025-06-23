<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateForgotPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', 'min:8',  'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/\d/', 'regex:/[^a-zA-Z\d]/'],

        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'The token field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least :min characters long.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one numeric digit, and one special character.',
        ];
    }
}
