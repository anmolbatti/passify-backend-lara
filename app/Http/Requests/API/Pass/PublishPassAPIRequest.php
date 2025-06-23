<?php

namespace App\Http\Requests\API\Pass;

use Illuminate\Foundation\Http\FormRequest;

class PublishPassAPIRequest extends FormRequest
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
            "id" => "required|exists:passes,id"
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Enter the ID.',
            'id.exists' => 'This pass doesnot exists.'
        ];
    }
}
