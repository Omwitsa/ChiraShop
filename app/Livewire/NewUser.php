<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Client;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class NewUser extends Component
{
    public $clients;
    public string $usercode = '';
    public string $email = '';
    public string $role = '';
    public string $password = '';
    public $isAdmin = false;
    public string $password_confirmation = '';
    public function render()
    {
        return view('livewire.new-user');
    }

    // public $varieties;
    public function mount()
    {
        $this->clients = Client::all();
        // $this->varieties = Variety::all();
        // users = DB::table('users')
        //         ->whereIn('id', [1, 2, 3])
        //         ->get();

        // $query->where('price', '>=', $min)
        //           ->where('price', '<=', $max);

        // // OR WHERE
        // Model::query()->where([])->orWhere([])->get();

        // // AND WHERE
        // Model::query()->where([['column1' , '!=' , 'value1'] , ['column2' , '=' , 'value2'] , ['column3' , '<' , 'value3']])->get();
    }

    public function createUser()
    {
        // personnel, active
        $validated = $this->validate([
            'usercode' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($user = User::create($validated)));
        $this->redirect(env('APP_ROOT').'users');
    }
}
