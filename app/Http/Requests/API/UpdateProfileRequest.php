<?php

namespace App\Http\Requests\API;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
            'phone' => ['required'],
            'organization_name' => ['required'],
            'organization_phone' => ['required']
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not exceed :max characters.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email address must not exceed :max characters.',
            'email.unique' => 'This email address is already in use.',
            'phone.required' => 'The phone field is required.',
            'organization_name.required' => 'The organization name field is required.',
            'organization_phone.required' => 'The organization phone field is required.',
        ];
    }
}
