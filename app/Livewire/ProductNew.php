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
    public string $category = '';
    public string $barcode = '';
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
        // // Decode the base64 string sent from the frontend
        // $imageData = explode(',', $this->croppedImage)[1];
    
        // // Using Intervention Image to force dimensions one last time
        // $img = Image::make(base64_decode($imageData))
        //     ->resize(800, 800);
        //     // ->encode('jpg', 80);



        // $extension = \Input::file('Photo')->getClientOriginalExtension(); // getting image extension
        // $fileName = md5($UserName).'.'.$extension; 
        // $ufile=\Input::file('Photo');
        // $ufile->move($destinationPath, $fileName);
        // $img = Image::make($destinationPath.$fileName)->resize(320, 240)->save($destinationPath.$fileName)


        // $imageFromStorage = Storage::get('images/avatar-image.jpg');
        // $image = Image::read($imageFromStorage);


        $name = time().'-'.$this->image->getClientOriginalName();
        $path = $this->image->storeAs('images', $name, 'public');

        $product = new Product;
        $product->name = $this->name;
        $product->code = $this->code;
        $product->category = $this->category;
        $product->barcode = $this->barcode;
        $product->isAddOn = $this->isAddOn === 1;
        $product->picUrl = $path;
        $product->save();

        //  // Reset state
        // // $this->reset(['image', 'croppedImage']);
        // session()->flash('message', 'Image saved successfully!');
        $this->redirect(env('APP_ROOT').'products');
    }

    public function render()
    {
        return view('livewire.product-new');
    }
}
