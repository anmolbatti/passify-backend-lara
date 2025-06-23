<?php

namespace App\Repositories;

use App\Interfaces\PassRepositoryInterface;
use App\Models\Pass;

class PassRepository implements PassRepositoryInterface{
    private $pass;

    public function __construct(Pass $pass)
    {
       $this->pass = $pass; 
    }

    public function storeDesign($data){
        $pass = new $this->pass;
        if($data->hasFile('logo_image')){
            $logo = $data->file('logo_image');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logo_images'), $logoName);
            $final_logo_name = 'uploads/logo_images/'.$logoName;
            $pass->logo_image = $final_logo_name;
        }

        if($data->hasFile('icon_image')){
            $icon = $data->file('icon_image');
            $iconName = time() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('uploads/icon_images'), $iconName);
            $final_icon_name = 'uploads/icon_images/'.$iconName;
            $pass->icon_image= $final_icon_name;
        }

        if($data->hasFile('picked_stamps_image')){
            $stampImage = $data->file('picked_stamps_image');
            $stampImageName = time() . '.' . $stampImage->getClientOriginalExtension();
            $stampImage->move(public_path('uploads/picked_stamps_images'), $stampImageName);
            $final_stampImage_name = 'uploads/picked_stamps_images/'.$stampImageName;
            $pass->picked_stamps_image = $final_stampImage_name;
        }

        if($data->hasFile('un_stamps_image')){
            $unstampImage = $data->file('un_stamps_image');
            $unstampImageName = time() . '.' . $unstampImage->getClientOriginalExtension();
            $unstampImage->move(public_path('uploads/un_stamps_images'), $unstampImageName);
            $final_unstampImage_name = 'uploads/un_stamps_images/'.$unstampImageName;
            $pass->un_stamps_image = $final_unstampImage_name;
        }

        $pass->reward_type = $data->reward_type;
        $pass->no_of_stamps = $data->no_of_stamps;
        $pass->picked_stamps_icon = $data->picked_stamps_icon;
        $pass->un_stamps_icon = $data->un_stamps_icon;
        $pass->card_bg_color = $data->card_bg_color;
        $pass->card_txt_color = $data->card_txt_color;
        $pass->strip_bg_color = $data->strip_bg_color;
        $pass->stamps_color = $data->stamps_color;
        $pass->stamps_border_color = $data->stamps_border_color;
        $pass->stamp_image_color = $data->stamp_image_color;
        $pass->unstamp_image_color = $data->unstamp_image_color;
        $pass->reward_bg_color = $data->reward_bg_color;
        $pass->reward_border_color = $data->reward_border_color;
        $pass->qr_type = $data->qr_type;
        $pass->reward_at_stamp_no = json_encode($data->reward_at_stamp_no);
        $pass->save();
        return $pass->id;
    }
}