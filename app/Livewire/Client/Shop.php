<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;

class Shop extends Component
{
    public $products;
    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.client.shop')->with([
            'products' => $this->products,
        ]);
    }
}
