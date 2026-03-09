<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $products;
    public function mount()
    {
        $this->products = Product::all();
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
