<?php

namespace App\Http\Requests\PassRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DesignStoreRequest extends FormRequest
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
            'reward_type' => 'required',
            'no_of_stamps' => 'required',
            'card_bg_color' => 'required',
            'card_txt_color' => 'required',
            'strip_bg_color' => 'required',
            'stamps_color' => 'required',
            'stamps_border_color' => 'required',
            'stamp_image_color' => 'required',
            'unstamp_image_color' => 'required',
            'reward_bg_color' => 'required',
            'reward_border_color' => 'required',
            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',
            'un_stamps_icon' => 'required_without_all:un_stamps_image',
            'picked_stamps_image' => 'required_without_all:picked_stamps_icon',
            'un_stamps_image' => 'required_without_all:un_stamps_icon',
            'logo_image' => 'required',
            'icon_image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reward_type.required' => 'Please select a reward type.',
            'no_of_stamps.required' => 'Please enter the number of stamps.',
            'picked_stamps_icon.required_without_all' => 'Please upload the picked stamps icon.',
            'card_bg_color.required' => 'Please select a card background color.',
            'card_txt_color.required' => 'Please select a card text color.',
            'strip_bg_color.required' => 'Please select a strip background color.',
            'stamps_color.required' => 'Please select a stamps color.',
            'stamps_border_color.required' => 'Please select a stamps border color.',
            'stamp_image_color.required' => 'Please select a stamp image color.',
            'unstamp_image_color.required' => 'Please select an unstamped image color.',
            'reward_bg_color.required' => 'Please select a reward background color.',
            'un_stamps_icon.required_without_all' => 'Please upload the unstamped icon.',
            'reward_border_color.required' => 'Please select a reward border color.',
            'logo_image.required' => 'Please upload a logo image.',
            'icon_image.required' => 'Please upload an icon image.',
            'picked_stamps_image.required_without_all' => 'Please upload the picked stamps image.',
            'un_stamps_image.required_without_all' => 'Please upload the unstamped image.',
        ];
    }
}
