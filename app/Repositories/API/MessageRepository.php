<?php

namespace App\Repositories\API;

use App\Interfaces\API\MessageRepositoryInterface;
use App\Models\PassUser;
use App\Models\Pass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MessageHistory;

use Carbon\Carbon;

class MessageRepository implements MessageRepositoryInterface
{
    private $passUser;

    public function __construct(PassUser $passUser)
    {
        $this->passUser = $passUser;
    }

    public function getMessageHistory()
    {
        try{
            if(Auth::user()){
                $data = MessageHistory::where('user_id', auth()->id())->get();
                return ['status' => true, 'data' => $data];
            }else{
                return ['status' => false,  'error' => 'User not found'];
            }
        } catch (\Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function passUserList($id)
    {
        try{
            if(Auth::user()){
                $data = PassUser::where('pass_id', $id)->select('name', 'id', 'pass_id', 'email', 'user_id')->get();
                return ['status' => true, 'data' => $data];
            }else{
                return ['status' => false,  'error' => 'User not found'];
            }


        }catch (\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}
