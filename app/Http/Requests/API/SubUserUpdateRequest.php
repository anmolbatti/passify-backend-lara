<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class SubUserUpdateRequest extends FormRequest
{
    private $id;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
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
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->id],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['sometimes', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name.',
            'email.required' => 'Please enter the Email.',
            'email.email' => 'Please enter valid Email.',
            'email.exists' => 'This email doesnot exists.',
            // 'email.unique' => 'Please select the correct email',
        ];
    }
}
