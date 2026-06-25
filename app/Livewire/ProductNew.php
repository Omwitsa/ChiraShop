<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Product;
use App\Models\ProductCategory;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;


class ProductNew extends Component
{
    use WithFileUploads;

    public $categories;
    public string $name = '';
    public string $code = '';
    public string $barcode = '';
    public string $reasonToLove = '';
    public string $description = '';
    public string $olFactoryNotes = '';
    public string $ingredients = '';
    public string $howToUse = '';
    public string $claims = '';
    public string $origin = '';
    public string $volume = '';
    public string $shipmentTime = '';
    public int $categoryId = 1;
    public $isAddOn;
    #[Validate('image|max:1024')] // 1MB Max
    public $image;         // holds a TemporaryUploadedFile
    public $croppedImage;
    
    public function mount()
    {
        $this->categories = ProductCategory::all();
        // $this->categories = ClientCategory::all();
        // $this->prices = Product::all();
        // $this->packrates = PackRateHeader::all();
        
    }

    public function creatProduct()
    {
        // Decode the base64 string sent from the frontend
        $imageData = explode(";base64,", $this->croppedImage)[1]; // Remove the 'data:image/png;base64,' part
        $decodedImage = base64_decode($imageData);

        // // Using Intervention Image to force dimensions one last time
        // $img = Image::make($decodedImage)
        //     ->resize(800, 800);
        //     // ->encode('jpg', 80);

        $name = time().'-'.$this->image->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $path = 'images/' . $filename . '.png';
        Storage::disk('public')->put($path, $decodedImage);

        $product = new Product;
        $product->name = $this->name;
        $product->code = $this->code;
        $product->categoryId = $this->categoryId;
        $product->barcode = $this->barcode;
        $product->reasonToLove = $this->reasonToLove;
        $product->description = $this->description;
        $product->olFactoryNotes = $this->olFactoryNotes;
        $product->ingredients = $this->ingredients;
        $product->howToUse = $this->howToUse;
        $product->claims = $this->claims;
        $product->origin = $this->origin;
        $product->volume = $this->volume;
        $product->shipmentTime = $this->shipmentTime;
        $product->isAddOn = $this->isAddOn === 1;
        $product->picUrl = $path;
        $product->save();
        
        $this->reset(['image', 'croppedImage']); // Reset state
        // session()->flash('message', 'Image saved successfully!');
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-new');
    }
}
