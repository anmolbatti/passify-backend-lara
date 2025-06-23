<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePassRequest;
use App\Http\Traits\Quota;
use App\Models\Link;
use App\Models\Location;
use App\Models\Pass;
use App\Models\Library;
use App\Models\PassLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PassController extends Controller
{
    use Quota;
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware(['check_card_design_count'])->only(['store']);
        $this->middleware('setLanguage');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassRequest $request)
    {        
        try {
            // dd($request);

            DB::beginTransaction();
            $data = $request->except(['_token', 'logo_image', 'icon_image', 'picked_stamps_image', 'un_stamps_image']);
            if ($request->hasFile('logo_image')) {
                $logo = $request->file('logo_image');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logo_images'), $logoName);
                $final_logo_name = 'uploads/logo_images/' . $logoName;
                $data['logo_image'] = $final_logo_name;
            }


            if ($request->hasFile('icon_image')) {

                $icon = $request->file('icon_image');
                $iconName = time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/icon_images'), $iconName);
                $final_icon_name = 'uploads/icon_images/' . $iconName;
                $data['icon_image'] = $final_icon_name;
            }

            if ($request->hasFile('picked_stamps_image')) {

                $stampImage = $request->file('picked_stamps_image');
                $stampImageName = time() . '.' . $stampImage->getClientOriginalExtension();
                $stampImage->move(public_path('uploads/picked_stamps_images'), $stampImageName);
                $final_stampImage_name = 'uploads/picked_stamps_images/' . $stampImageName;
                $data['picked_stamps_image'] = $final_stampImage_name;
            }

            if ($request->hasFile('un_stamps_image')) {

                $unstampImage = $request->file('un_stamps_image');
                $unstampImageName = time() . '.' . $unstampImage->getClientOriginalExtension();
                $unstampImage->move(public_path('uploads/un_stamps_images'), $unstampImageName);
                $final_unstampImage_name = 'uploads/un_stamps_images/' . $unstampImageName;
                $data['un_stamps_image'] = $final_unstampImage_name;
            }

            if ($request->hasFile('change_strip_bg_image')) {

                $all_stamps_bg_image = $request->file('change_strip_bg_image');
                $all_stamps_bg_imageName = time() . '.' . $all_stamps_bg_image->getClientOriginalExtension();
                $all_stamps_bg_image->move(public_path('uploads/picked_stamps_images'), $all_stamps_bg_imageName);
                $final_all_stamps_bg_imageName = 'uploads/picked_stamps_images/' . $all_stamps_bg_imageName;
                $data['all_stamps_bg_image'] = $final_all_stamps_bg_imageName;
            }

            // dd($data);

            // 'stamps_color' => $request->stamps_color,
            // 'stamps_border_color' => $request->stamps_border_color,
            $data['header_fields'] = json_encode($request->header_fields);
            $data['secondary_fields'] = json_encode($request->secondary_fields);
            $data['stamp_bg_color'] = $request->stamps_color;
            $data['un_stamp_bg_color'] = $request->stamps_color;
            $data['stamps_color'] = $request->stamps_border_color;
            $data['stamps_border_color'] = $request->stamps_border_color;
            $data['strip_bg_color'] = $request->strip_bg_color;
            $data['no_of_stamps'] = $request->no_of_stamps;
            $data['reward_at_stamp_no'] = json_encode($request->reward_at_stamp_no);
            $data['reward_border_color'] = $request->reward_border_color;
            $data['reward_bg_color'] = $request->reward_bg_color;
            $data['stamp_image_color'] = $request->stamp_image_color;
            $data['unstamp_image_color'] = $request->unstamp_image_color;
            $data['category'] = $request->category;
            $data['picked_stamps_icon'] = $request->stamped_icon;
            $data['un_stamps_icon'] = $request->unstamped_icon;
            $data['businessName'] = $request->business_name;
            $data['card_description'] = $request->card_description;
            $data['how_can_earn'] = $request->how_can_earn;
            $data['reward_name'] = $request->reward_name;
            $data['reward_description'] = $request->reward_description;
            $data['stamp_success_message'] = $request->stamp_success_message;

            // change rbg color to hex
            $sCSSString = $request->card_bg_color;
            $sRegex = "/(\d{1,3})\,?\s?(\d{1,3})\,?\s?(\d{1,3})/";

            preg_match($sRegex, $sCSSString, $matches);  

            $iRed   = (int) $matches[1];  
            $iGreen = (int) $matches[2];  
            $iBlue  = (int) $matches[3];

            $sHexValue = dechex($iRed) . dechex($iGreen) . dechex($iBlue);

            $hexColor = '#' . $sHexValue;
            $data['card_bg_color_hex'] = $hexColor;


            $data['expiry_type'] = $request->expiry_type;

            if($request->expiry_type == "fixed_period"){
                $data['expiry_period_type'] = $request->expiry_period_type;
                $data['expiry_period_count'] = $request->expiryNumber;
            }

            if($request->expiry_type == "fixed_date"){
                $data['expiry_period_type'] = $request->expiry_period_type;
                $data['expiry_date'] = $request->expiry_date;
            }
            // $data['status'] = false;

            // pending
            $data['pass_name'] = microtime(true);
            $data['no_of_picked_stamps'] = 7;
            $data['no_of_un_stamps'] = 3;

            $user = Auth::user();
            // dd($user);
            if ($user->parent_user != null && $user->parent_user != "") {
                $data['vendor_id'] = $user->parent_user;
            } else {
                $data['vendor_id'] = $user->id;
            }

            // dd($data);
            $new_pass = Library::create($data);

            // dd($request);

            if(!empty($request->link_text) && $request->link_text[0] !== NULL){

                foreach ($request->link_text as $key => $value) {
                    $link_text = $request->link_text[$key];
                    $link_href = $request->link_href[$key];
                    $link_type = $request->link_type[$key];
                    
                    Link::create([
                        'link_text' => $link_text,
                        'link_href' => $link_href,
                        'link_type' => $link_type,
                        'pass_id' => $new_pass->id,
                        // 'pass_id' => 8,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('library.view');

            // return redirect()->route('manage.image', ['id' => $new_pass->id]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
