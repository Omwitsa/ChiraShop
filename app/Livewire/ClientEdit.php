<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\ClientCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClientEdit extends Component
{
    public $categories;
    public $client;
    public $active;
    public string $name = '';
    public string $code = '';
    public int $categoryId = 1;
    public string $group = '';
    public string $emailRecepients = '';
    public string $currency = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount($id)
    {
        $this->categories = ClientCategory::all();
        $this->client = Client::find($id);
        $this->name = $this->client->name;
        $this->code = $this->client->code;
        $this->categoryId = $this->client->categoryId;
        $this->group = $this->client->group;
        $this->emailRecepients = $this->client->emailRecepients;
        $this->currency = $this->client->currency;
        $this->password = $this->client->password;
        $this->password_confirmation = $this->client->password;
        $this->active = $this->client->active === 1;
    }

    public function UpdateClient()
    {
        if($this->password != $this->password_confirmation){
            toastr()->error('Password and confirm password do not match', 'Sorry', ['positionClass' => 'toast-top-center']);
            return;
        }

        $this->client->name = $this->name;
        $this->client->code = $this->code;
        $this->client->categoryId = $this->categoryId;
        $this->client->group = $this->group;
        $this->client->emailRecepients = $this->emailRecepients;
        $this->client->currency = $this->currency;
        $this->client->password = Str::length($this->password) > 30 ? $this->password : Hash::make($this->password);
        $this->client->active = $this->active;

        $this->client->save();
        toastr()->success('Client updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.client-edit');
    }
}
