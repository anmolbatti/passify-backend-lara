<?php

namespace App\Repositories\API;

use App\Interfaces\API\PassRepositoryInterface;
use App\Models\Link;
use App\Models\Location;
use App\Models\Pass;
use App\Models\PassLocation;
use App\Models\PassUser;
use App\Models\PassReward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PassRepository implements PassRepositoryInterface{

    private $pass;
    private $location;

    public function __construct(Pass $pass, Location $location)
    {
       $this->pass = $pass;
       $this->location = $location;
    }

    public function storeDesign($data)
    {
        try {
            $pass = new $this->pass;
            if ($data->hasFile('logo_image')) {
                $logo = $data->file('logo_image');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logo_images'), $logoName);
                $final_logo_name = 'uploads/logo_images/' . $logoName;
                $pass->logo_image = $final_logo_name;
            }else{
                if($data->type == "template"){
                    if($data->logo_image1 && file_exists($data->logo_image1)){
                        $oldPath = public_path($data->logo_image1);
                        
                        $ext = pathinfo(
                            parse_url($oldPath, PHP_URL_PATH), 
                            PATHINFO_EXTENSION
                        );
                        $filename = time() .'.'.$ext;
                        $newPath = public_path('uploads/logo_images/'.$filename);
                        \File::copy($oldPath , $newPath);
                        $pass->logo_image ='uploads/logo_images/'.$filename;
                    }
                }
            }

            if ($data->hasFile('icon_image')) {
                $icon = $data->file('icon_image');
                $iconName = time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/icon_images'), $iconName);
                $final_icon_name = 'uploads/icon_images/' . $iconName;
                $pass->icon_image = $final_icon_name;
            }else{
                if($data->type == "template"){
                    if($data->icon_image1 && file_exists($data->icon_image1)){
                        $oldPath = public_path($data->icon_image1);
                        
                        $ext = pathinfo(
                            parse_url($oldPath, PHP_URL_PATH), 
                            PATHINFO_EXTENSION
                        );
                        $filename = time() .'.'.$ext;
                        $newPath = public_path('uploads/icon_images/'.$filename);
                        \File::copy($oldPath , $newPath);
                        $pass->icon_image ='uploads/icon_images/'.$filename;
                    }
                }
            }

            if ($data->hasFile('picked_stamps_image')) {
                $stampImage = $data->file('picked_stamps_image');
                $stampImageName = time() . '.' . $stampImage->getClientOriginalExtension();
                $stampImage->move(public_path('uploads/picked_stamps_images'), $stampImageName);
                $final_stampImage_name = 'uploads/picked_stamps_images/' . $stampImageName;
                $pass->picked_stamps_image = $final_stampImage_name;
            }else{
                if($data->type == "template"){
                    if($data->picked_stamps_image1 && file_exists($data->picked_stamps_image1)){
                        $oldPath = public_path($data->picked_stamps_image1);
                        
                        $ext = pathinfo(
                            parse_url($oldPath, PHP_URL_PATH), 
                            PATHINFO_EXTENSION
                        );
                        $filename = time() .'.'.$ext;
                        $newPath = public_path('uploads/picked_stamps_images/'.$filename);
                        \File::copy($oldPath , $newPath);
                        $pass->picked_stamps_image ='uploads/picked_stamps_images/'.$filename;
                    }
                }
            }

            if ($data->hasFile('un_stamps_image')) {
                $unstampImage = $data->file('un_stamps_image');
                $unstampImageName = time() . '.' . $unstampImage->getClientOriginalExtension();
                $unstampImage->move(public_path('uploads/un_stamps_images'), $unstampImageName);
                $final_unstampImage_name = 'uploads/un_stamps_images/' . $unstampImageName;
                $pass->un_stamps_image = $final_unstampImage_name;
            }else{
                if($data->type == "template"){
                    if($data->un_stamps_image1 && file_exists($data->un_stamps_image1)){
                        $oldPath = public_path($data->un_stamps_image1);
                        
                        $ext = pathinfo(
                            parse_url($oldPath, PHP_URL_PATH), 
                            PATHINFO_EXTENSION
                        );
                        $filename = time() .'.'.$ext;
                        $newPath = public_path('uploads/un_stamps_images/'.$filename);
                        \File::copy($oldPath , $newPath);
                        $pass->un_stamps_image ='uploads/un_stamps_images/'.$filename;
                    }
                }
            }
            if ($data->hasFile('strip_bg_image')) {
                $stripImage = $data->file('strip_bg_image');
                $stripImageName = time() . '.' . $stripImage->getClientOriginalExtension();
                $stripImage->move(public_path('uploads/strip_bg_images'), $stripImageName);
                $final_stripImage_name = 'uploads/strip_bg_images/' . $stripImageName;
                $pass->strip_bg_image = $final_stripImage_name;
            }else{
                if($data->type == "template"){
                    if($data->strip_bg_image1 && file_exists($data->strip_bg_image1)){
                        $oldPath = public_path($data->strip_bg_image1);
                        
                        $ext = pathinfo(
                            parse_url($oldPath, PHP_URL_PATH), 
                            PATHINFO_EXTENSION
                        );
                        $filename = time() .'.'.$ext;
                        $newPath = public_path('uploads/picked_stamps_images/'.$filename);

                        \File::copy($oldPath , $newPath);
                        $pass->strip_bg_image = 'uploads/picked_stamps_images/'.$filename;
                    }
                }
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
            // $pass->reward_at_stamp_no = json_encode($data->reward_at_stamp_no);
            $pass->reward_at_stamp_no = $data->reward_at_stamp_no;
            $pass->pass_name = microtime(true);
            $pass->no_of_picked_stamps = 7;
            $pass->no_of_un_stamps = 3;
            $pass->status = false;

            // change rbg color to hex
            $sCSSString = $data->card_bg_color;
            $sRegex = "/(\d{1,3})\,?\s?(\d{1,3})\,?\s?(\d{1,3})/";

            preg_match($sRegex, $sCSSString, $matches);  

            $iRed   = (int) $matches[1];  
            $iGreen = (int) $matches[2];  
            $iBlue  = (int) $matches[3];

            $sHexValue = dechex($iRed) . dechex($iGreen) . dechex($iBlue);

            $hexColor = '#' . $sHexValue;
            $pass->card_bg_color_hex = $hexColor;

            $user = Auth::user();
            if ($user->parent_user != null && $user->parent_user != "") {
                $pass->vendor_id = $user->parent_user;
                $pass->business_name = $user->organization_name ?? null;
                $pass->businessName = $user->organization_name ?? null;
            } else {
                $pass->vendor_id = $user->id;
                $pass->business_name = $user->organization_name  ?? null;
                $pass->businessName = $user->organization_name  ?? null;
            }
            

           
            $pass->save();
            return ['status' => true, 'data' => $pass];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
            // return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function updateDesignById($data)
    {
        try {
            $pass = $this->pass::find($data->id);
            if ($data->hasFile('logo_image') && is_file($data->file('logo_image'))) {
                $logo = $data->file('logo_image');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logo_images'), $logoName);
                $final_logo_name = 'uploads/logo_images/' . $logoName;
                $pass->logo_image = $final_logo_name;
            }

            if ($data->hasFile('icon_image') && is_file($data->file('icon_image'))) {
                $icon = $data->file('icon_image');
                $iconName = time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/icon_images'), $iconName);
                $final_icon_name = 'uploads/icon_images/' . $iconName;
                $pass->icon_image = $final_icon_name;
            }

            if ($data->hasFile('picked_stamps_image') && is_file($data->file('picked_stamps_image'))) {
                $stampImage = $data->file('picked_stamps_image');
                $stampImageName = time() . '.' . $stampImage->getClientOriginalExtension();
                $stampImage->move(public_path('uploads/picked_stamps_images'), $stampImageName);
                $final_stampImage_name = 'uploads/picked_stamps_images/' . $stampImageName;
                $pass->picked_stamps_image = $final_stampImage_name;
            }

            if ($data->hasFile('un_stamps_image') && is_file($data->file('un_stamps_image'))) {
                $unstampImage = $data->file('un_stamps_image');
                $unstampImageName = time() . '.' . $unstampImage->getClientOriginalExtension();
                $unstampImage->move(public_path('uploads/un_stamps_images'), $unstampImageName);
                $final_unstampImage_name = 'uploads/un_stamps_images/' . $unstampImageName;
                $pass->un_stamps_image = $final_unstampImage_name;
            }
            if ($data->hasFile('strip_bg_image') && is_file($data->file('strip_bg_image'))) {
                $stripImage = $data->file('strip_bg_image');
                $stripImageName = time() . '.' . $stripImage->getClientOriginalExtension();
                $stripImage->move(public_path('uploads/strip_bg_images'), $stripImageName);
                $final_stripImage_name = 'uploads/strip_bg_images/' . $stripImageName;
                $pass->strip_bg_image = $final_stripImage_name;
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
            // $pass->reward_at_stamp_no = json_encode($data->reward_at_stamp_no);
            $pass->reward_at_stamp_no = $data->reward_at_stamp_no;
            $pass->pass_name = microtime(true);
            $pass->no_of_picked_stamps = 7;
            $pass->no_of_un_stamps = 3;
            $pass->status = false;

            // change rbg color to hex
            $sCSSString = $data->card_bg_color;
            $sRegex = "/(\d{1,3})\,?\s?(\d{1,3})\,?\s?(\d{1,3})/";

            preg_match($sRegex, $sCSSString, $matches);  

            $iRed   = (int) $matches[1];  
            $iGreen = (int) $matches[2];  
            $iBlue  = (int) $matches[3];

            $sHexValue = dechex($iRed) . dechex($iGreen) . dechex($iBlue);

            $hexColor = '#' . $sHexValue;
            $pass->card_bg_color_hex = $hexColor;

            $user = Auth::user();
            if ($user->parent_user != null && $user->parent_user != "") {
                $pass->vendor_id = $user->parent_user;
            } else {
                $pass->vendor_id = $user->id;
            }
            $pass->save();
            return ['status' => true, 'data' => $pass];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
            // return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function storeDetails($data)
    {
        try {

            $pass = $this->pass->find($data->id);
            $pass->card_description = $data->card_description;
            $pass->how_can_earn = $data->how_can_earn;
            $pass->business_name = $data->business_name;
            $pass->reward_name = $data->reward_name;
            $pass->reward_description = $data->reward_description;
            $pass->stamp_success_message = $data->stamp_success_message;
            $pass->reward_success_message = $data->reward_success_message;
            $pass->expiry_date = $data->expiry_date;
            $pass->expiry_type = $data->expiry_type;
            $pass->expiry_period_type = $data->expiry_period_type;
            $pass->expiry_period_count = $data->expiry_period_count;
            $pass->termsAndConditions = $data->termsAndConditions;
            $pass->poweredBy = $data->poweredBy;
            $pass->howToCollectStamps = $data->howToCollectStamps;
            $pass->rewardDetail = $data->rewardDetail;
            $pass->businessName = $data->businessName;
            $link = Link::where('pass_id', $data->id)->delete();
            $usefull_links = $data->usefull_links;
            if (isset($usefull_links) && count($usefull_links) > 0) {
                foreach ($data->usefull_links as $key => $value) {
                    $link_text = $value['link_text'];
                    $link_href = $value['link_href'];
                    $link_type = $value['link_type'];

                    Link::create([
                        'link_text' => $link_text,
                        'link_href' => $link_href,
                        'link_type' => $link_type,
                        'pass_id' => $data->id,
                    ]);
                }
            }
            // dd($data->rewards);
            // $passRewards = PassReward::where('pass_id', $data->id)->delete();
            // $rewards = $data->rewards;
            // if (isset($rewards) && count($rewards) > 0) {
            //     foreach ($data->rewards as $keyy => $reward_value) {
            //         $reward_name = $reward_value['reward_name'];
            //         $reward_description = $reward_value['reward_description'];
            //         $stamp_success_message = $reward_value['stamp_success_message'];
            //         $reward_success_message = $reward_value['reward_success_message'];
            //         $stamp_no = $reward_value['stamp_no'];

            //         PassReward::create([
            //             'reward_name' => $reward_name,
            //             'reward_description' => $reward_description,
            //             'stamp_success_message' => $stamp_success_message,
            //             'reward_success_message' => $reward_success_message,
            //             'stamp_no' => $stamp_no,
            //             'pass_id' => $data->id,
            //         ]);
            //     }
            // }
            $pass->save();
            return ['status' => true, 'data' => $pass];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
            // return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function readById($id){
        try {
            $pass = $this->pass->with('links','userLocations','pass_images')->findorFail($id);
            if($pass){
                return ['status' => true, 'data' => $pass];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
            // return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function storeFields($data){
        try {
            $pass = $this->pass->find($data->id);
            $pass->header_fields = json_encode($data->header_fields);
            $pass->secondary_fields = json_encode($data->secondary_fields);
            $pass->save();
            return ['status' => true, 'data' => $pass];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function updatePassLocation($data)
    {
        // return ['status' => true, 'data' => gettype($data->display)];
        try {
            $pass = $this->pass->find($data->id);
            $user = Auth::user();
            $vendor_id = $user->parent_user ?? $user->id;
            $location_id = $data->location_id;

            if ($data->display == true) {
                $previousPassLocation = PassLocation::where('location_id', $location_id)
                    ->where('user_id', $vendor_id)
                    ->where('pass_id', $pass->id)
                    ->first();

                if (!$previousPassLocation) {
                    PassLocation::create([
                        'location_id' => $location_id,
                        'user_id' => $vendor_id,
                        'pass_id' => $pass->id,
                    ]);
                    $message = "Your location has been added against pass.";
                } else {
                    $message = "Your location already exists against pass.";
                }
            } else {
                $previousPassLocation = PassLocation::where('location_id', $location_id)
                    ->where('user_id', $vendor_id)
                    ->where('pass_id', $pass->id)
                    ->first();

                if ($previousPassLocation) {
                    $previousPassLocation->delete();
                    $message = "Your location has been removed against pass.";
                } else {
                    $message = "Your location was previously deleted against pass.";
                }
            }

            return ['status' => true, 'data' => $message];


            // if (sizeof($data->location_id) > 0) {
            //     foreach ($data->locations_id as $key => $value) {
            //         $locations_id = $data->locations_id[$key];
            // PassLocation::create([
            //     'location_id' => $location_id,
            //     'user_id' => $data['vendor_id'],
            //     'pass_id' => $pass->id,
            // ]);
            // }
            // return ['status' => true, 'data' => $location_id];
            // } else {
            //     return ['status' => false,  'error' => 'Please select at least 1 location.'];
            // }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }
    
    public function storeNewLocation(array $data){
        try {
            $location = new $this->location;
            $location->latitude = $data['latitude'] ;
            $location->longitude = $data['longitude'] ;
            $location->location_name = $data['location_name'] ;
            $location->location_description = $data['location_description'] ;
            $location->location_search = $data['location_search'] ;
            $location->status = true;
            $location->default = true;

            $user = Auth::user();
            if($user->parent_user != null && $user->parent_user != ""){
                $data['vendor_id'] = $user->parent_user;
            }
            else{
                $data['vendor_id'] = $user->id;
            }
            $user_id =$data['vendor_id'];
            $location->user_id = $user_id;
            $location->save();
            return ['status' => true, 'data' => $location];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function publish(array $data){
        try {
            $pass = $this->pass->find($data['id']);
            $pass->status = true;
            $pass->save();
            return ['status' => true, 'data' => $pass];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }

        return $data;
    }

    public function readByUser($offset,$limit){
        try {
            $user = Auth::user();
            if($user->parent_user != null && $user->parent_user != ""){
                $user_id = $user->parent_user;
            }
            else{
                $user_id = $user->id;
            }
            // $offset = 1;
            // $limit = 6;
            
            // $pass['passData'] = Pass::with('pass_images')->where('vendor_id',$user_id)->offset($offset)->limit($limit)->get();
            $pass['passData'] = Pass::with(['pass_images' => function ($query) {
                $query->select('id', 'pass_id','stamp_earned','image_path');
            }])->where('vendor_id',$user_id)->offset($offset)->limit($limit)->orderBy('id','desc')->get();
            $pass['totalRecords'] = Pass::with('pass_images')->count();
            $pass['offset'] = $offset;
            $pass['limit'] = $limit;

            // $page = floor($offset / $limit) + 1;
            // Fetch data using paginate with calculated page and the limit
            // $pass = Pass::paginate($limit, ['*'], 'page', $page);
            // return $data;

            return ['status' => true, 'data' => $pass];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function detailById($id){
        try {
            $data['id'] = $id;
            $data['installs_to_wallet'] = PassUser::where('pass_id',$id)->where('deviceLibraryIdentifier',"!=", null )->where('pushToken','!=', null)->count();
            $data['Uninstalled_from_wallet'] = PassUser::where('pass_id',$id)->where('deviceLibraryIdentifier',"!=", null )->where('pushToken','=', null)->count();
            $data['Rewards_redeemed'] = PassUser::where('pass_id',$id)->sum('stamps_earned');
            $passes = Pass::where('vendor_id',Auth::user()->id)->pluck('id');
            // $data['passUsers'] = PassUser::wherein('pass_id',$passes)->get();
            $data['passUsers'] = PassUser::where('pass_id',$id)->get();
            $data['passData'] = Pass::with('pass_images')->where('id',$id)->first();
            return ['status' => true, 'data' => $data];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }   
    }

    public function deleteById($id){
        try {
            $passUsers = Pass::where('id',$id)->delete();
            if($passUsers){
                return ['status' => true, 'data' => $id];
            }
            else{
                return ['status' => false,  'error' => 'Pass not found.'];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }   
    }

    public function deleteLocation($id){
        try {
            $location = Location::find($id);
            if($location){
                $user = Auth::user();
                $auth_user_id = $user->id;
                $location_user_id = $location->user_id;
                if($auth_user_id == $location_user_id){
                    $location->delete();
                    return ['status' => true, 'data' => $id];
                }
                else{
                return ['status' => false,  'error' => 'You are not allowed to delete this location.'];
                }
            }
            else{
                return ['status' => false,  'error' => 'Location not found.'];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }  
    }

    public function getCards(){
        try {
            $location = Pass::with('pass_images','links','passLocations')->where('is_temp', true)->get();
            return ['status' => true, 'data' => $location];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }  
    }

    public function readLocationsOfUser($pass_id){
        try {
            $user = Auth::user();
            if ($user->parent_user != null && $user->parent_user != "") {
                $data['vendor_id'] = $user->parent_user;
            } else {
                $data['vendor_id'] = $user->id;
            }
            // $pass_id = $data->id;
            // $locationList = Location::with('passLocations')->where('user_id', $data['vendor_id'])->get();
            // $locationList = Location::where('user_id', $data['vendor_id'])->whereHas('passLocations', function($query) use ($pass_id) {
            //                     $query->where('pass_id', $pass_id);
            //                 })->get();
            // $locationList = Location::where('user_id', $data['vendor_id'])
            //     ->whereHas('passLocations', function ($query) use ($pass_id) {
            //         $query->where('pass_id', $pass_id);
            //     })
            //     // ->with('passLocations')
            //     ->get();

            $locationList = Location::with(['passLocations' => function ($query) use ($pass_id) {
                    $query->where('pass_id', $pass_id);
                }])->where('user_id', $data['vendor_id'])->get();
            // return $locationList;
            // $locations = [];

            // foreach ($locationList as $location) {
            //     $passLocations = PassLocation::where('location_id', $location->id)
            //                                 ->where('pass_id', $pass_id)
            //                                 ->get();

            //     if ($passLocations->isNotEmpty()) {
            //         $locations[$location->id]['location'] = $location;
            //         $locations[$location->id]['passLocations'] = $passLocations;
            //     }
            // }




            // [
            //     {
            //         // data for one location
            //         pass_location:{
            //             // dadta for 
            //         }
            //     }
            // ]


            return ['status' => true, 'data' => $locationList];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

}