<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\dropoff;
use App\Models\ClientCategory;
use App\Models\Region;
use App\Models\PriceHeader;
use App\Models\PackRateHeader;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class NewClient extends Component
{
    public $dropoffs;
    public $countries;
    public $prices;
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
    public $active;

    public function mount()
    {
        $this->dropoffs = dropoff::all();
        // $this->categories = ClientCategory::all();
        $this->countries = Region::all();
        $this->prices = PriceHeader::all();
        // $this->packrates = PackRateHeader::all();
    }

    public function creatClient()
    {
        $validated = $this->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Code' => ['required', 'string', 'max:50'],
            'Type' => ['required', 'string', 'max:50'],
            'group' => ['required', 'string', 'max:50'],
            'DropOff' => ['required', 'string', 'max:255'],
            'EmailRecepients' => ['string'],
            'Country' => ['required', 'string', 'max:50'],
            'Price' => ['string', 'max:100'],
            'Currency' => ['string', 'max:50'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($client = Client::create($validated)));

        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.new-client');
    }
}
