<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubUserDeleteRequest;
use App\Http\Requests\SubUserStoreRequest;
use App\Http\Requests\SubUserUpdateRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Traits\Quota;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class SubUserController extends Controller
{
    use Quota;

    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface
    )
    {
        $this->middleware('auth');
        $this->middleware('setLanguage');

        $this->middleware(['check_user_count'])->only(['create','store']);

        $this->userRepository = $userRepositoryInterface;
    }

    public function index()
    {
        $parent_id = auth()->user()->id;
        $users = $this->userRepository->getSubUsersByParentId($parent_id);
        return view('loyality.user_create', compact('users'));
    }

    public function create()
    {

        return view('loyality.user_add');
    }

    public function store(SubUserStoreRequest $request)
    {
        $vendor_id = auth()->user()->id;
        $this->userRepository->createUserWithParentId($request, $vendor_id);

        return redirect()->back()->withSuccess('completed');
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('loyality.user_edit', compact('user'));
    }

    public function update(SubUserUpdateRequest $request, $id)
    {
        $request->setId($id);
        $this->userRepository->updateUser($request, $id);

        return redirect()->back()->withSuccess('updated');
    }

    public function delete($id)
    {
        $this->userRepository->deleteUser($id);
        return redirect()->back()->withSuccess('deleted');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->userRepository->updateUser($request,auth()->user()->id);

        return redirect()->back()->withSuccess('updated');

    }
}
