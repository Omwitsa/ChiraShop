<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductNew extends Component
{
    public $categories;
    public string $name = '';
    public string $code = '';
    public string $category = '';
    public string $barcode = '';
    public $active;

    public function mount()
    {
        $this->categories = ProductCategory::all();
        // $this->categories = ClientCategory::all();
        // $this->prices = Product::all();
        // $this->packrates = PackRateHeader::all();
    }

    public function creatProduct()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'code' => ['required', 'string', 'max:50'],
            'category' => ['required', 'string', 'max:100'],
            'barcode' => ['required', 'string'],
        ]);

        Product::create($validated);
        toastr()->success('Product created successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-new');
    }
}
