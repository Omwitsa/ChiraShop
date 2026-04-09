<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\PriceHeader;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class ClientNew extends Component
{
    public $prices;
    public string $name = '';
    public string $code = '';
    public string $type = '';
    public string $group = '';
    public string $emailRecepients = '';
    public string $price = '';
    public string $currency = '';
    public string $password = '';
    public string $password_confirmation = '';
    public $active;

    public function mount()
    {
        // $this->categories = ClientCategory::all();
        $this->prices = PriceHeader::all();
        // $this->packrates = PackRateHeader::all();
    }

    public function creatClient()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:50'],
            'type' => ['required', 'string', 'max:50'],
            'group' => ['required', 'string', 'max:50'],
            'emailRecepients' => ['required', 'string'],
            'price' => ['string', 'max:100'],
            'currency' => ['string', 'max:50'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($client = Client::create($validated)));

        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.client-new');
    }
}
