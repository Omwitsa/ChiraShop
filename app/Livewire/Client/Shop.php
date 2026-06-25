<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Auth;

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
        ->join('products', 'product_categories.id', '=', 'products.categoryId')
        ->select('product_categories.id', 'product_categories.name', 'product_categories.sortOrder')
        ->orderBy('product_categories.sortOrder')
        ->distinct()
        ->get();
        
        $this->categoryProducts();
    }

    public function viewInfo($id){
        $this->redirectRoute('product-info', ['id' => $id]);
    }

    public function categoryProducts1()
    {
        $clientCategoryId = Auth::guard('client')->user()->categoryId;

        foreach ($this->productCategories as $key => $value) {
            $productCategory = (object) $value;
            $products= DB::select('SELECT * FROM products WHERE categoryId = ? AND active = true', [$productCategory->id]);
            foreach ($products as $p_key => $p_value) {
                $product = (object) $p_value;
                $product->price = 0;
                $itemOrdered = in_array($product->id, array_column($this->cartItems, 'id'));
                $product->addedToCart = empty($this->cartItems) ? false : $itemOrdered;
                
                $line = DB::table('price_headers')
                    ->join('price_lines', 'price_headers.id', '=', 'price_lines.price_header_id')
                    ->where('price_headers.clientCategoryId', $clientCategoryId)
                    ->where('price_lines.productId', $product->id)
                    ->whereNull('price_headers.endDate')
                    ->select('price_lines.price')
                    ->first();

                $product->price = $line->price;
            }

            $productCategory->products = $products;
        }
    }

    public function categoryProducts()
    {
        $clientCategoryId = Auth::guard('client')->user()->categoryId;

        foreach ($this->productCategories as $key => $value) {
            $productCategory = (object) $value;
            $products= DB::select('SELECT p.id, p.name, p.code, p.barcode, p.active, p.minimumOrder, p.picUrl, p.inStock, p.isAddOn, p.reasonToLove, 
            p.description, p.olFactoryNotes, p.ingredients, p.howToUse, p.claims, p.origin, p.volume, p.shipmentTime, p.categoryId, l.price 
            FROM products p INNER JOIN price_lines l ON p.id = l.productId INNER JOIN price_headers h ON h.id = l.price_header_id 
            WHERE h.endDate IS NULL AND h.clientCategoryId = ? AND p.active = true AND p.categoryId = ? AND l.price > 0;', [$clientCategoryId, $productCategory->id]);
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
