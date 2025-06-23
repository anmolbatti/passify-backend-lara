<?php

namespace App\Repositories;

use App\Http\Traits\Quota;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    use Quota;
    public function createUser($name, $email, $password, $organization_name, $phone, $language, $organization_phone){
        // return $name;
        $trail_expiry = now()->addDays(30);

        $user = User::where('email',$email)->first();

        if(!$user){
            return $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'trail_expiry' => $trail_expiry,
                'organization_name' => $organization_name,
                'phone' => $phone,
                'language' => $language,
                'organization_phone' => $organization_phone
            ]);
        }
        else {
            return $user;
        }

    }

    public function getSubUsersByParentId($parent_id){
        return User::where('is_sub_user', true)->where('parent_user', $parent_id)->get();
    }

    public function getUserById($id){
        return User::where('id', $id)->first();

    }

    public function createUserWithParentId($request, $vendor_id){
        // use quota
        $this->AddUserCount($vendor_id);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'is_sub_user' => 1,
            'parent_user' => $vendor_id
        ]);

    }

    public function updateUser($request, $id){
        $user = User::find($id);

        $data = $request->except('_token');

        if ($request->has('password')) {
            $data += [
                'password' => Hash::make($request->password)
            ];
        }

        return $user->update($data);

    }

    public function deleteUser($id){
        $user = User::find($id);

        if($user){
            return $user->delete();
        }
        else{
            return false;
        }

    }

    public function changeLanguage(array $data){
        $user = Auth::user();
        $user_id = $user->id;
        $userData = User::where('id', $user_id)->first();
        $userData->language = $data['language'];
        $userData->save();
        return $userData;
    }

}
