<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductNew extends Component
{
    use WithFileUploads;

    public $categories;
    public string $name = '';
    public string $code = '';
    public string $category = '';
    public string $barcode = '';
    public $isAddOn;
    #[Validate('image|max:1024')] // 1MB Max
    public $file; // holds a TemporaryUploadedFile

    public function mount()
    {
        $this->categories = ProductCategory::all();
        // $this->categories = ClientCategory::all();
        // $this->prices = Product::all();
        // $this->packrates = PackRateHeader::all();
    }

    public function creatProduct()
    {
        $name = time().'-'.$this->file->getClientOriginalName();
        $path = $this->file->storeAs('images', $name, 'public');

        $product = new Product;
        $product->name = $this->name;
        $product->code = $this->code;
        $product->category = $this->category;
        $product->barcode = $this->barcode;
        $product->isAddOn = $this->isAddOn === 1;
        $product->picUrl = $path;
        $product->save();

        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-new');
    }
}
