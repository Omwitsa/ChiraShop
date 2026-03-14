<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Shop extends Component
{
    public $productCategories;
    public function mount()
    {
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
            // foreach ($products as $p_key => $p_value) {
            //     $product = (object) $p_value;
            //     $product->focused = false;
            // }
            $productCategory->products = $products;
        }
    }

    public function render()
    {
        return view('livewire.client.shop')->with([
            'productCategories' => $this->productCategories,
        ]);
    }
}
