<?php

namespace App\Repositories\API;

use App\Interfaces\API\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

use Carbon\Carbon;

class AuthRepository implements AuthRepositoryInterface{
    
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function changeLanguage(array $data){
        try {
            $user = $this->user->find($data['user_id']);
            $user->language = $data['data']['language'];
            $user->save();
            return ['status' => true, 'data' => $user];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function forgetPassword($data){
        
        try {
            // $status = Password::sendResetLink(
            //     $data->only('email')
            // );
            $status = "";
            return ['status' => true, 'data' => $status];
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }
    
    public function delete(){
        try {
            $user = Auth::user();
            $user_data = $this->user->find($user->id);
            if($user_data){
                $user_data->delete();
                return ['status' => true, 'data' => "Success: User has been deleted."];
            }
            else{
                return ['status' => false,  'Error: User not found'];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function readById(array $data){
        try {
            $user = $this->user->find($data['id']);
            if($user){
                return ['status' => true, 'data' => $user];
            }
            else{
                return ['status' => false,  'error' => 'User not found'];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function getUserInfo(){
        try {
            if(Auth::user()){
                $user = User::with('subscription.plan')->where('id',Auth::user()->id)->first();
                $status = 1;
                $day = 0;
                if($user->plan_activated){
                    $day = Carbon::now()->diffInDays(Carbon::parse(date('Y-m-d', strtotime($user->plan_expiry))));
                    if(strtotime($user->plan_expiry) <= time() ){
                        $status = 3;
                    } 
                }else{
                    $status = 2;
                    $day = Carbon::now()->diffInDays(Carbon::parse(date('Y-m-d', strtotime($user->trail_expiry))));
                    if($user->trail_expiry){
                        if(strtotime($user->trail_expiry) <= time() ){
                            $status = 4;
                        } 
                    }
                }
                $user->day = $day;
                $user->status = $status;
                unset($user->password);
                unset($user->remember_token);
                unset($user->created_at);
                return ['status' => true, 'data' => $user];
            }
            else{
                return ['status' => false,  'error' => 'User not found'];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }

    public function updatePassword(array $data){
        try {
            $user = Auth::user();
            $previousPassword = $user->password;
            $currentPasswordFromRequest = $data['currentPassword'];
            if(Hash::check($currentPasswordFromRequest, $previousPassword)){
                $newHashedPassword = Hash::make($data['newPassword']);
                $user_data = $this->user->find($user->id);
                $user_data->password = $newHashedPassword;
                $user_data->save();
                return ['status' => true, 'data' => $user_data];
            }
            else{
                return ['status' => false,  'error' => 'Enter correct password'];
            }
        } catch (\Exception $e) {
            return ['status' => false,  'error' => $e->getMessage()];
        }
    }
}