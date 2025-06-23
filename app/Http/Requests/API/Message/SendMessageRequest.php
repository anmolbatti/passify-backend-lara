<?php

namespace App\Http\Requests\API\Message;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
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
            'passId' => 'required',
            'message' => 'required',
            'customer_type' => 'nullable|in:1,2,3,4',
            'type' => 'required|in:1,2', // Corrected validation rule
            'customerId' => 'required_without:customer_type', // Required if type is not provided
        ];
    }


    public function messages(): array
    {
        return [
            'passId.required' => 'Select Card field is required',
            'message.required' => 'Message field is required',
            'customer_type.in' => 'Customer type is required',
            'customerId.required_without' => 'Customer name is required',
            'type.required' => 'Segment type is required',
        ];
    }
    
}
