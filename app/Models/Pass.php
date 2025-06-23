<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
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

        'header_fields',
        'secondary_fields',

        'location_name',
        'address',
        'address_description',
        'card_description',
        'how_can_earn',
        'business_name',
        'reward_name',
        'reward_description',
        'stamp_success_message',
        'reward_success_message',
        'expiry_date',
        // 'link_text',
        // 'link_href',
        // 'link_type',
        'is_temp',
        'vendor_id',
        'reward_at_stamp_no',
        'reward_border_color',
        'reward_bg_color',
        'stamp_image_color',
        'unstamp_image_color',
        'expiry_type',
        'termsAndConditions',
        'poweredBy',
        'howToCollectStamps',
        'rewardDetail',
        'businessName',
        'card_bg_color_hex'
    ];

    public function pass_images()
    {
        return $this->hasMany(PassImage::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function passLocations()
    {
        return $this->belongsToMany(Location::class, 'pass_addresses');
    }

    public function userLocations()
    {
        return $this->hasManyThrough(Location::class, User::class, 'id', 'user_id', 'vendor_id');
    }

    public function pass_users()
    {
        return $this->hasMany(PassUser::class);
    }
}
