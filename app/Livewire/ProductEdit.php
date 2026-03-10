<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $categories;
    public string $name = '';
    public string $code = '';
    public string $category = '';
    public string $barcode = '';
    public $product;
    public string $picUrl = '';
    public $active;
    public $isAddOn;
    public $inStock;

    #[Validate('image|max:1024')] // 1MB Max
    public $file; // holds a TemporaryUploadedFile

    public function mount($id)
    {
        $this->categories = ProductCategory::all();
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->code = $this->product->code;
        $this->category = $this->product->category;
        $this->barcode = $this->product->barcode;
        $this->picUrl = $this->product->picUrl;
        $this->active = $this->product->active === 1;
        $this->isAddOn = $this->product->isAddOn === 1;
        $this->inStock = $this->product->inStock === 1;
    }

    public function UpdateProduct()
    {
        if($this->file){
            $name = time().'-'.$this->file->getClientOriginalName();
            $path = $this->file->storeAs('images', $name, 'public');
            $this->product->picUrl = $path;
        }

        $this->product->name = $this->name;
        $this->product->code = $this->code;
        $this->product->category = $this->category;
        $this->product->barcode = $this->barcode;
        $this->product->active = $this->active;
        $this->product->isAddOn = $this->isAddOn;
        $this->product->inStock = $this->inStock;
        
        $this->product->save();
        toastr()->success('Product updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-edit');
    }
}
