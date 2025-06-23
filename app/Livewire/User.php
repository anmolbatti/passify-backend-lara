<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    // public $users;
    public $name;
    public $phone;
    public $email;
    public $organization_phone;
    public $organization_name;
    public $query = '';

    public function render()
    {
        // sleep(2);
        $users = ModelsUser::where('is_sub_user', false)
            ->where('role', '!=', 'Admin')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%')
                    ->orWhere('email', 'like', '%' . $this->query . '%')
                    ->orWhere('organization_name', 'like', '%' . $this->query . '%');
            })
            ->paginate(10);

        // dd($users);
        return view('livewire.user')->with('users', $users);

        // return view('livewire.user')->with('users',ModelsUser::paginate(10));
        // return view('livewire.user');
    }

    public function userDetail($id)
    {
        $user = ModelsUser::find($id);
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->organization_name = $user->organization_name;
        $this->organization_phone = $user->organization_phone;
    }
}
