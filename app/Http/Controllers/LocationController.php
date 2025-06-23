<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationStoreRequest;
use App\Interfaces\LocationRepositoryInterface;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $location_repository;

    public function __construct(LocationRepositoryInterface $location_repository)
    {
        $this->location_repository = $location_repository;
        $this->middleware('setLanguage');
    }

    public function index()
    {
        //
    }

    public function store(LocationStoreRequest $request)
    {
        $location = $this->location_repository->store($request->all());
        return response()->json(["status"=>"200"]);
    }

    public function read()
    {
        $location = $this->location_repository->read();
        $json_data["data"] = $location;
        return json_encode($json_data);
    }

    public function remove($id){
        $location = $this->location_repository->remove($id);
        return response()->json(["status"=>"200"]);
    }

    public function readById(Request $request){
        $location = $this->location_repository->readById($request->all());
        return $location;
    }
    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
