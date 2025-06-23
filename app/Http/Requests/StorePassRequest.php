<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassRequest extends FormRequest
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
            // 'pass_name' => 'required',
            // 'reward_type' => 'required',
            // 'icon_image' => 'required',
            // 'logo_image' => 'required',
            // 'no_of_stamps' => 'required',
            // 'stamps_color' => 'required',
            // 'stamp_bg_color' => 'required',
            // 'stamps_border_color' => 'required',
            // 'no_of_picked_stamps' => 'required',
            // 'picked_stamps_image' => 'required_without:picked_stamps_icon',
            // 'picked_stamps_icon' => 'required',
            // 'no_of_un_stamps' => 'required',
            // 'un_stamp_bg_color' => 'required',
            // 'un_stamps_image' => 'required_without:un_stamps_icon',
            // 'un_stamps_icon' => 'required',
            // 'card_bg_color' => 'required',
            // 'card_txt_color' => 'required',
            // 'strip_bg_color' => 'required',
            // 'qr_type' => 'required'
        ];
    }
}
