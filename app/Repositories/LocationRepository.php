<?php

namespace App\Repositories;

use App\Interfaces\LocationRepositoryInterface;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class LocationRepository implements LocationRepositoryInterface{
    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function store(array $data){
        $location = new $this->location;
        $location->latitude = $data['latitude'] ;
        $location->longitude = $data['longitude'] ;
        $location->location_name = $data['location_name'] ;
        $location->location_description = $data['location_description'] ;
        $location->location_search = $data['location_search'] ;
        $location->status = true;
        $location->default = true;

        $user = Auth::user();
        $user_id = $user->id;
        $location->user_id = $user_id;
        $location->save();
        return $location;
    }

    public function read(){
        $user = Auth::user();
        $user_id = $user->id;
        return $this->location::where('deleted_at',null)->where('user_id',$user_id)->get();
    }
    
    public function remove($id){
        $location = $this->location::find($id);
        $location->delete();
        return true;
    }

    public function readById(array $data){
        $location = $this->location::find($data['id']);
        return $location;
    }
}