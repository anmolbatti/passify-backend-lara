<?php

namespace App\Http\Requests\API\Pass;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewLocationAPIRequest extends FormRequest
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
            'latitude' => 'required',
            'longitude' => 'required',
            'location_name' => 'required',
            'location_description' => 'required',
            'location_search' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'latitude.required' => 'Please enter the Latitude.',
            'longitude.required' => 'Please enter the Longitude.',
            'location_name.required' => 'Please enter the Location Name.',
            'location_description.required' => 'Please enter the Location Description.',
            'location_search.required' => 'Please enter the Location Search.',
        ];
    }
}
