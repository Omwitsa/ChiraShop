<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class Shop extends Component
{
    public $productCategories;
    public $cartItems;
    public function mount()
    {
        // Session::forget('cartItems');
        $this->cartItems = session('cartItems'); 
        if(!isset($this->cartItems)){
            $this->cartItems = [];
        }

        $this->productCategories = DB::table('product_categories')
        ->join('products', 'product_categories.name', '=', 'products.category')
        ->select('product_categories.name', 'product_categories.sortOrder')
        ->orderBy('product_categories.sortOrder')
        ->distinct()
        ->get();
        
        $this->categoryProducts();
    }

    public function categoryProducts()
    {
        foreach ($this->productCategories as $key => $value) {
            $productCategory = (object) $value;
            $products= DB::select('SELECT * FROM products WHERE category = ? AND active = true', [$productCategory->name]);
            foreach ($products as $p_key => $p_value) {
                $product = (object) $p_value;
                $itemOrdered = in_array($product->id, array_column($this->cartItems, 'id'));
                $product->addedToCart = empty($this->cartItems) ? false : $itemOrdered;
            }

            $productCategory->products = $products;
        }
    }

    public function addToCart($c_index, $p_index)
    {
        $category = $this->productCategories[$c_index];
        $product = $category->products[$p_index];
        $product->addedToCart = true;
        $product->quantity = 1;
        $product->price = 1500;
        $product->subTotal = $product->quantity * $product->price;

        $itemOrdered = in_array($product->id, array_column($this->cartItems, 'id'));
        if(!$itemOrdered){
            Session::push('cartItems', $product);
        }
        
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.client.shop')->with([
            'productCategories' => $this->productCategories,
        ]);
    }
}
