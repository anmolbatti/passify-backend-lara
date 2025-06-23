<?php

namespace App\Http\Controllers;

use App\Models\Pass;
use App\Models\PassImage;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use ApiResponse;
    public function manage_images($id){
        $pass = Pass::where('id',$id)->with('pass_images')->first();
        return view('manage_images')->with('pass',$pass);
    }

    public function manage_images_store($id, Request $request){
        // return collect($request->all());
        // dd($request);
        // if($request != null){
            // return $request;
            if(count($request->all()) != 0){
                // return "ok";
            // return $request;
            // foreach($request as $image_data){
            //     // return "loop started";
            //     if(isset($image_data['image'])){
            //         return "isset checked";
            //         $pass_image = PassImage::where('pass_id',$id)->where('stamp_earned',$image_data['stamp_earned'])->first();

            //         // Remove the data:image/png;base64 part
            //         $base64Image = explode(',', $image_data['image'])[1];

            //         // Decode the base64 image
            //         $imageData = base64_decode($base64Image);

            //         // Generate a unique filename for the image
            //         $filename = 'image_' . $image_data['stamp_earned'] . '.png';

            //         // Store the image in the public disk
            //         Storage::disk('public')->put('images/pass_images/'. $id . "/" . $filename, $imageData);

            //         if(!$pass_image){
            //             return "ok";
            //             PassImage::create([
            //                 'pass_id' => $id,
            //                 'stamp_earned' => $image_data['stamp_earned'],
            //                 'image' => $image_data['image'],
            //                 'image_path' => 'storage/images/pass_images/'. $id . "/" . $filename
            //             ]);
            //         }
            //         else{
            //             return "notok";

            //             $pass_image->update([
            //                 'image' => $image_data['image'],
            //                 'image_path' => 'storage/images/pass_images/'. $id . "/" . $filename
            //             ]);
            //         }
            //     }
            // }
            foreach (collect($request->all()) as $key => $image_data) {
                // Accessing stamp_earned and image from the ParameterBag
                $stamp_earned = $image_data['stamp_earned'];
                $image = $image_data['image'];
                // return $image;
            
                if ($image) {
                    $pass_image = PassImage::where('pass_id', $id)
                                            ->where('stamp_earned', $stamp_earned)
                                            ->first();
            
                    // Remove the data:image/png;base64 part
                    $base64Image = explode(',', $image)[1];
            
                    // Decode the base64 image
                    $imageData = base64_decode($base64Image);
            
                    // Generate a unique filename for the image
                    $filename = 'image_' . $stamp_earned . '_' . uniqid() . '.png';
            
                    // Store the image in the public disk
                    Storage::disk('public')->put('images/pass_images/'. $id . "/" . $filename, $imageData);
            
                    if (!$pass_image) {
                        PassImage::create([
                            'pass_id' => $id,
                            'stamp_earned' => $stamp_earned,
                            'image' => $image,
                            'image_path' => 'storage/images/pass_images/'. $id . "/" . $filename
                        ]);
                    } else {
                        $pass_image->update([
                            'image' => $image,
                            'image_path' => 'storage/images/pass_images/'. $id . "/" . $filename
                        ]);
                    }
                }
            }
            
        }
        else{
            $message = "Something went wrong.";
            return $this->fail_response($message);
        }
        // return "after store";
        if (strpos($request->getRequestUri(), '/api/') !== false) {
            // The request URI contains '/api/'

            $data = $request->all();
            $message = "images created";
            return $this->success_response($data,$message);
        } else {
            // The request URI does not contain '/api/'
            // Handle accordingly
            return redirect()->route('dashboard');
        }
    }
}
