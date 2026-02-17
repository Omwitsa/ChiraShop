<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\dropoff;
use App\Models\ClientCategory;
use App\Models\Region;
use App\Models\PriceHeader;
use App\Models\PackRateHeader;

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
    public string $EmailRecepients = '';
    public string $DropOff = '';
    public string $Country = '';
    public string $Price = '';
    public string $Currency = '';
    public string $password = '';

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
        $this->EmailRecepients = $this->client->EmailRecepients;
        $this->DropOff = $this->client->DropOff;
        $this->Country = $this->client->Country;
        $this->Price = $this->client->Price;
        $this->Currency = $this->client->Currency;
        $this->password = $this->client->password;
        $this->active = $this->user->active === 1;
    }

    public function UpdateClient()
    {
        $this->client->Name = $this->Name;
        $this->client->Code = $this->Code;
        $this->client->Type = $this->Type;
        $this->client->EmailRecepients = $this->EmailRecepients;
        $this->client->DropOff = $this->DropOff;
        $this->client->Country = $this->Country;
        $this->client->Price = $this->Price;
        $this->client->Currency = $this->Currency;
        $this->user->password = Str::length($this->user->password) > 30 ? $this->password : Hash::make($this->password);
        $this->user->active = $this->active;
        
        $this->client->save();
        toastr()->success('Client updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.edit-client');
    }
}
