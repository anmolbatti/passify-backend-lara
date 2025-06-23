<?php

namespace App\Http\Requests\API\Pass;

use Illuminate\Foundation\Http\FormRequest;

class DetailsStoreRequest extends FormRequest
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
            "id" => "required|exists:passes,id",
            // 'rewards' => ['required', 'array', 'min:1'],
            // 'rewards.*.reward_name' => ['required'],
            // 'rewards.*.reward_description' => ['required'],
            // 'rewards.*.stamp_success_message' => ['required'],
            // 'rewards.*.reward_success_message' => ['required'],
            // 'rewards.*.stamp_no' => ['required','integer'],
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Please provide the pass ID.',
            'id.exists' => 'The provided pass ID is invalid.',
            // 'rewards.required' => 'Please provide reward data.',
            // 'rewards.array' => 'The rewards must be provided as an array.',
            // 'rewards.min' => 'At least one reward must be provided.',
            // 'rewards.*.reward_name.required' => 'Please provide the name for all rewards.',
            // 'rewards.*.reward_description.required' => 'Please provide the description for all rewards.',
            // 'rewards.*.stamp_success_message.required' => 'Please provide the stamp success message for all rewards.',
            // 'rewards.*.reward_success_message.required' => 'Please provide the reward success message for all rewards.',
            // 'rewards.*.stamp_no.required' => 'Please provide the Stamp No.',
            // 'rewards.*.stamp_no.integer' => 'Please provide the value of Stamp no in integer form.',
        ];
    }
}
