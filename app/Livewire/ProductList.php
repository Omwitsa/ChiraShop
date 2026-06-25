<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductList extends Component
{
    public $products;
    public function mount()
    {
       $this->products = DB::select('SELECT p.id, p.name, p.code, p.barcode, p.minimumOrder, p.active, p.inStock, p.isAddOn, c.name AS category FROM products p INNER JOIN product_categories c ON p.categoryId = c.id ORDER BY c.name, p.name;');
    }

    public function edit($id){
        $this->redirectRoute('edit-product', ['id' => $id]);
    }

    public function delete($id){
        $region = Product::find($id);
        $region->delete();
        toastr()->success('Product deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-list')->with([
            'products' => $this->products,
        ]);
    }
}
