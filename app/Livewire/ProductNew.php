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
    public string $reasonToLove = '';
    public string $description = '';
    public string $olFactoryNotes = '';
    public string $ingredients = '';
    public string $howToUse = '';
    public string $claims = '';
    public string $origin = '';
    public string $volume = '';
    public string $shipmentTime = '';
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
        // $imageData = explode(',', $this->croppedImage)[1];
    
        // // Using Intervention Image to force dimensions one last time
        // $img = Image::make(base64_decode($imageData))
        //     ->resize(800, 800);
        //     // ->encode('jpg', 80);

        // Storage::disk('public')->put('profiles/user-1.jpg', $img);



        // $extension = \Input::file('Photo')->getClientOriginalExtension(); // getting image extension
        // $fileName = md5($UserName).'.'.$extension; 
        // $ufile=\Input::file('Photo');
        // $ufile->move($destinationPath, $fileName);
        // $img = Image::make($destinationPath.$fileName)->resize(320, 240)->save($destinationPath.$fileName)


        // $imageFromStorage = Storage::get('images/avatar-image.jpg');
        // $image = Image::read($imageFromStorage);




        // // Decode the base64 string sent from the frontend
        // $imageData = explode(',', $this->croppedImage)[1];
        // $decodedImage = base64_decode($imageData);

        // $name = 'cropped_' . time() . '.png';
        // Storage::disk('public')->put($name, $decodedImage);

        // // Reset state
        // $this->reset(['image', 'croppedImage']);



        dd($this->croppedImage);
        // // Remove the 'data:image/png;base64,' part
        // $image_parts = explode(";base64,", $this->croppedImage);
        // $image_base64 = base64_decode($image_parts[1]);

        // $filename = 'crops/' . uniqid() . '.png';
        // Storage::disk('public')->put($filename, $image_base64);


        $name = time().'-'.$this->image->getClientOriginalName();
        $path = $this->image->storeAs('images', $name, 'public');

        $product = new Product;
        $product->name = $this->name;
        $product->code = $this->code;
        $product->category = $this->category;
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
