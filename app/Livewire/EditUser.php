<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EditUser extends Component
{
    public $clients;
    public $user;
    public $active;
    public string $usercode = '';
    public string $email = '';
    public string $role = '';
    public string $password = '';
    public $isAdmin = false;
    public string $password_confirmation = '';

    public function mount($id)
    {
        $this->clients = Client::all();
        $this->user = User::find($id);
        $this->usercode = $this->user->usercode;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
        $this->password = $this->user->password;
        $this->password_confirmation = $this->user->password;
        $this->active = $this->user->active === 1;

        // dd($this->user);
    }

    public function UpdateUser()
    {
        if($this->password != $this->password_confirmation){
            toastr()->error('Password and confirm password do not match', 'Sorry', ['positionClass' => 'toast-top-center']);
            return;
        }
        $this->user->usercode = $this->usercode;
        $this->user->email = $this->email;
        $this->user->role = $this->role;
        $this->user->password = Str::length($this->user->password) > 30 ? $this->password : Hash::make($this->password);
        $this->user->active = $this->active;
        $this->user->save();

        toastr()->success('User updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'users');
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
