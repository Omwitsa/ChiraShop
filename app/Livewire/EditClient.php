<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\dropoff;
use App\Models\ClientCategory;
use App\Models\Region;
use App\Models\PriceHeader;
use App\Models\PackRateHeader;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EditClient extends Component
{
    public $client;
    public $dropoffs;
    public $countries;
    public $prices;
    public $active;
    public string $Name = '';
    public string $Code = '';
    public string $Type = '';
    public string $group = '';
    public string $EmailRecepients = '';
    public string $DropOff = '';
    public string $Country = '';
    public string $Price = '';
    public string $Currency = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount($id)
    {
        $this->dropoffs = dropoff::all();
        // $this->categories = ClientCategory::all();
        $this->countries = Region::all();
        $this->prices = PriceHeader::all();
        // $this->packrates = PackRateHeader::all();
        $this->client = Client::find($id);
        $this->Name = $this->client->Name;
        $this->Code = $this->client->Code;
        $this->Type = $this->client->Type;
        $this->group = $this->client->group;
        $this->EmailRecepients = $this->client->EmailRecepients;
        $this->DropOff = $this->client->DropOff;
        $this->Country = $this->client->Country;
        $this->Price = $this->client->Price;
        $this->Currency = $this->client->Currency;
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

        $this->client->Name = $this->Name;
        $this->client->Code = $this->Code;
        $this->client->Type = $this->Type;
        $this->client->group = $this->group;
        $this->client->EmailRecepients = $this->EmailRecepients;
        $this->client->DropOff = $this->DropOff;
        $this->client->Country = $this->Country;
        $this->client->Price = $this->Price;
        $this->client->Currency = $this->Currency;
        $this->client->password = Str::length($this->client->password) > 30 ? $this->password : Hash::make($this->password);
        $this->client->active = $this->active;
        
        $this->client->save();
        toastr()->success('Client updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.edit-client');
    }
}
