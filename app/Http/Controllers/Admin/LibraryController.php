<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class LibraryController extends Controller
{
    public function index()
    {
        $pass = new stdClass();
        $pass->logo_image = null;
        $pass->hero_image = null;
        $pass->barcode_image = null;
        $pass->first_label_value = null;
        $pass->second_label_value = null;
        $pass->is_expiry_date = null;

        $stamps = $this->getStamps();
        return view('loyality.create', compact('pass', 'stamps'));
    }

    public function view_library()
    {
        $libraries = Library::all();
        // dd($libraries);
        return view('loyality.view', compact('libraries'));
    }

    public function delete_library(Request $request)
    {
        try {
            $id = $request->library_id;
            Library::where('id', $id)->delete();
            
            return json_encode(["status"=> 1 , "message" => "Library Pass Deleted!"]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getStamps()
    {
        $stamps = [
            'Tea' => asset('assets/img/tea.png'),
            'Hair' => asset('assets/img/salon.png'),
            'Nail' => asset('assets/img/nail.png'),
            'Massage' => asset('assets/img/massage.png'),
            'Hookah' => asset('assets/img/hookah.png'),
            'Dog' => asset('assets/img/dog.png'),
            'Cat' => asset('assets/img/cat.png'),
            'Battery' => asset('assets/img/battery.png'),
            'Gift' =>  asset('assets/img/gift.png'),
            'Burger' =>  asset('assets/img/burger.png'),
            'Oil' => asset('assets/img/oil.png'),
            'Juice' =>  asset('assets/img/juice.png'),
            'Coffee' =>  asset('assets/img/coffee.png'),
            'Ice_cream' =>  asset('assets/img/ice_cream.png'),
            'Longue' => asset('assets/img/longue.png'),
            'Spa' =>  asset('assets/img/spa.png'),
            'Pet' =>  asset('assets/img/pet.png'),
            'Shaving' =>  asset('assets/img/shaving.png'),
        ];


        return $stamps;
    }
}
