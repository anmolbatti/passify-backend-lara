<?php

namespace App\Http\Requests\API;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;


class SignUpAPIRequest extends FormRequest
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
            "name" => "required",
            "email" => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            "password" => ['required', Rules\Password::defaults()],
            "language" => "required"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your Name.',
            'email.required' => 'Please enter the Email.',
            'email.unique' => 'This email already Exists.',
            'email.email' => 'Please enter valid Email.',
            'password.required' => 'Please enter your Password.',
            'language.required' => 'Please select the Language.',
        ];
    }
}
