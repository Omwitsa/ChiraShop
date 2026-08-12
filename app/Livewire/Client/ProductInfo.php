<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductInfo extends Component
{
    public $product;
    public $cartItems;

    public function mount($id)
    {
        $this->cartItems = session('cartItems'); 
        if(!isset($this->cartItems)){
            $this->cartItems = [];
        }

        $products =  DB::select('SELECT * FROM products WHERE id = ?', [$id]);
        foreach ($products as $p_key => $p_value) {
            $this->product = (object) $p_value;
            $this->product->images = explode(';', $this->product->picUrl);
            $this->product->firstImage = $this->product->images[0];
        }
    }

    public function addToCart()
    {
        $this->product->addedToCart = true;
        $this->product->quantity = 1;
        $this->product->price = 1500;
        $this->product->subTotal = $this->product->quantity * $this->product->price;

        $itemOrdered = in_array($this->product->id, array_column($this->cartItems, 'id'));
        if(!$itemOrdered){
            Session::push('cartItems', $this->product);
        }
        
        $this->redirect(env('APP_ROOT').'shop');
    }

    public function render()
    {
        return view('livewire.client.product-info');
    }
}
