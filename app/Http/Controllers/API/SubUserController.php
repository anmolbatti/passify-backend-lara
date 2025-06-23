<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubUserShowRequest;
use App\Http\Requests\API\SubUserStoreRequest;
use App\Http\Requests\API\SubUserUpdateRequest;
use App\Http\Requests\API\UpdateProfileRequest;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\Quota;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class SubUserController extends Controller
{
    use Quota;
    use ApiResponse;

    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface
    )
    {
        $this->middleware('auth');
        $this->userRepository = $userRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parent_id = auth()->user()->id;
        $users = $this->userRepository->getSubUsersByParentId($parent_id);
        if($users){
            return $this->success_response($users, "Sub Users");
        }
        else{
            return $this->fail_response("Something went wrong");
        }
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
    public function store(SubUserStoreRequest $request)
    {
        $vendor_id = auth()->user()->id;
        $data = $this->userRepository->createUserWithParentId($request, $vendor_id);
        if($data){
            return $this->success_response($data, "Sub User Created");
        }
        else{
            return $this->fail_response("Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->userRepository->getUserById($id);
        if($data){
            return $this->success_response($data, "Sub User");
        }
        else{
            return $this->fail_response("Something went wrong");
        }
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
    public function update(SubUserUpdateRequest $request, string $id)
    {
        $request->setId($id);
        $data = $this->userRepository->updateUser($request, $id);
        if($data){
            return $this->success_response($data, "Sub User Updated");
        }
        else{
            return $this->fail_response("Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = $this->userRepository->deleteUser($id);
        if($data){
            return $this->success_response($data, "Sub User Deleted");
        }
        else{
            return $this->fail_response("Something went wrong");
        }
        
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = $this->userRepository->updateUser($request,auth()->user()->id);

        if($data){
            return $this->success_response($data, "Updated");
        }
        else{
            return $this->fail_response("Something went wrong");
        }

    }
}
