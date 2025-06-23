<?php

namespace App\Http\Requests\API\Pass;

use App\Rules\validateImageSize;
use Illuminate\Foundation\Http\FormRequest;

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
            'strip_bg_color' => 'required_without_all:strip_bg_image',
            // 'strip_bg_image' => 'required_without_all:strip_bg_color',
            'strip_bg_image' => ['required_without_all:strip_bg_color', new validateImageSize],
            'stamps_color' => 'required',
            'stamps_border_color' => 'required',
            'stamp_image_color' => 'required',
            'unstamp_image_color' => 'required',
            'reward_bg_color' => 'required',
            'reward_border_color' => 'required',
            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',
            'un_stamps_icon' => 'required_without_all:un_stamps_image',

            'picked_stamps_icon' => 'required_without_all:picked_stamps_image',
            'picked_stamps_image' => ['required_without_all:picked_stamps_icon', new validateImageSize],

            'un_stamps_icon' => 'required_without_all:un_stamps_image',
            'un_stamps_image' => ['required_without_all:un_stamps_icon', new validateImageSize],
            
            'logo_image' => ['required', new validateImageSize],
            // 'icon_image' => 'required',
            'icon_image' => ['required', new validateImageSize],
            'qr_type' => 'required',
            // 'reward_at_stamp_no' => 'required'
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
            'qr_type.required' => 'Please select a QR Type.',
            // 'reward_at_stamp_no.required' => 'Please enter the stamp no at reward.'
        ];
    }
}
