<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class ProductEdit extends Component
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
    public $product;
    public string $picUrl = '';
    public $active;
    public $isAddOn;
    public $inStock;
    #[Validate('image|max:2048')] // 2MB Max
    public $image;         // holds a TemporaryUploadedFile
    public $images = []; // holds a TemporaryUploadedFile

    public $croppedImage;

    public function mount($id)
    {
        $this->categories = ProductCategory::all();
        $this->product = Product::find($id);
        $this->name = $this->product->name;
        $this->code = $this->product->code;
        $this->categoryId = $this->product->categoryId;
        $this->barcode = $this->product->barcode;
        $this->reasonToLove = $this->product->reasonToLove;
        $this->description = $this->product->description;
        $this->olFactoryNotes = $this->product->olFactoryNotes;
        $this->ingredients = $this->product->ingredients;
        $this->howToUse = $this->product->howToUse;
        $this->claims = $this->product->claims;
        $this->origin = $this->product->origin;
        $this->volume = $this->product->volume;
        $this->shipmentTime = $this->product->shipmentTime;
        $this->picUrl = $this->product->picUrl;
        $this->product->images = explode(';', $this->product->picUrl);
        $this->active = $this->product->active === 1;
        $this->isAddOn = $this->product->isAddOn === 1;
        $this->inStock = $this->product->inStock === 1;
    }

    public function UpdateProduct()
    {
        $this->validate([
            'images.*' => 'image|max:2048', // 2MB each
        ]);

        $this->picUrl = empty($this->images) ? $this->picUrl : '';
        foreach ($this->images as $image) {
            
            $name = time().'-'.$image->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);

            $path = 'images/' . $filename . '.png';
            // Storage::disk('public')->put($path, $decodedImage);

            $image->storeAs('/', $path, 'public');

            $this->picUrl = Str::of($this->picUrl)->isEmpty() ? $path : $this->picUrl . ';' . $path;
        }

        // if($this->image){
        //     // Decode the base64 string sent from the frontend
        //     $imageData = explode(";base64,", $this->croppedImage)[1]; // Remove the 'data:image/png;base64,' part
        //     $decodedImage = base64_decode($imageData);

        //     // // Using Intervention Image to force dimensions one last time
        //     // $img = Image::make($decodedImage)
        //     //     ->resize(800, 800);
        //     //     // ->encode('jpg', 80);

        //     $name = time().'-'.$this->image->getClientOriginalName();
        //     $filename = pathinfo($name, PATHINFO_FILENAME);
        //     $path = 'images/' . $filename . '.png';
        //     Storage::disk('public')->put($path, $decodedImage);
        //     $this->product->picUrl = $path;
        // }

        $this->product->name = $this->name;
        $this->product->code = $this->code;
        $this->product->categoryId = $this->categoryId;
        $this->product->barcode = $this->barcode;
        $this->product->active = $this->active;
        $this->product->isAddOn = $this->isAddOn;
        $this->product->inStock = $this->inStock;
        $this->product->reasonToLove = $this->reasonToLove;
        $this->product->description = $this->description;
        $this->product->olFactoryNotes = $this->olFactoryNotes;
        $this->product->ingredients = $this->ingredients;
        $this->product->howToUse = $this->howToUse;
        $this->product->claims = $this->claims;
        $this->product->origin = $this->origin;
        $this->product->volume = $this->volume;
        $this->product->shipmentTime = $this->shipmentTime;
        $this->product->picUrl = $this->picUrl;
        $this->product->save();
        toastr()->success('Product updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-edit');
    }
}
