<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        'pass_name',
        'status',
        'reward_type',
        'icon_image',
        'logo_image',
        'no_of_stamps',
        'picked_stamps_image',
        'picked_stamps_icon',
        'un_stamps_image',
        'un_stamps_icon',
        'card_bg_color',
        'card_txt_color',
        'strip_bg_color',
        'strip_bg_image',
        'stamps_color',
        'stamps_border_color',
        'qr_type',
        'stamp_bg_color',
        'un_stamp_bg_color',
        'no_of_picked_stamps',
        'no_of_un_stamps',
        'reward_at_stamp_no',
        'header_fields',
        'secondary_fields',
        'location_name',
        'address',
        'address_description',
        'is_temp',
        'reward_border_color',
        'reward_bg_color',
        'stamp_image_color',
        'unstamp_image_color',
        'termsAndConditions',
        'poweredBy',
        'howToCollectStamps',
        'rewardDetail',
        'businessName',
        'card_description',
        'how_can_earn',
        'reward_name',
        'reward_description',
        'stamp_success_message',
        'expiry_type',
        'expiry_period_type',
        'expiry_period_count',
        'expiry_date',
        'all_stamps_bg_image',
        'card_bg_color_hex'
    ];

}
