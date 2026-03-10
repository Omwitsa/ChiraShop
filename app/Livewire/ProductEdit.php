<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $client;
    public $categories;
    public $prices;
    public $active;
    public string $name = '';
    public string $code = '';
    public string $type = '';
    public string $group = '';
    public string $emailRecepients = '';
    public string $price = '';
    public string $currency = '';
    public string $password = '';
    public string $password_confirmation = '';

    #[Validate('image|max:1024')] // 1MB Max
    public $file; // holds a TemporaryUploadedFile 

    public function mount($id)
    {
        $this->categories = ProductCategory::all();
        $this->prices = PriceHeader::all();
        $this->client = Client::find($id);
        $this->name = $this->client->name;
        $this->code = $this->client->code;
        $this->type = $this->client->type;
        $this->group = $this->client->group;
        $this->emailRecepients = $this->client->emailRecepients;
        $this->price = $this->client->price;
        $this->currency = $this->client->currency;
        $this->password = $this->client->password;
        $this->password_confirmation = $this->client->password;
        $this->active = $this->client->active === 1;

        $this->picUrl = $this->variety->picUrl;
    }

    public function UpdateClient()
    {
        if($this->file){
            $name = time().'-'.$this->file->getClientOriginalName();
            $path = $this->file->storeAs('images', $name, 'public');
            $this->variety->picUrl = $path;
        }

        $this->client->name = $this->name;
        $this->client->code = $this->code;
        $this->client->type = $this->type;
        $this->client->group = $this->group;
        $this->client->emailRecepients = $this->emailRecepients;
        $this->client->price = $this->price;
        $this->client->currency = $this->currency;
        $this->client->password = Str::length($this->client->password) > 30 ? $this->password : Hash::make($this->password);
        $this->client->active = $this->active;
        
        $this->client->save();
        toastr()->success('Client updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-edit');
    }
}
