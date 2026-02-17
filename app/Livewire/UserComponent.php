<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();
    }

    public function edit($id){
        $this->redirectRoute('edit-user', ['id' => $id]);
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        toastr()->success('User deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'users');
    }

    
    public function render()
    {
        // dd(auth()->user());
        return view('livewire.user')->with([
            'users' => $this->users,
        ]);
    }
}
