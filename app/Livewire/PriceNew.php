<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PriceHeader;
use App\Models\PriceLine;
use App\Models\Product;
use App\Models\ClientCategory;
use Illuminate\Support\Facades\DB;

class PriceNew extends Component
{
    public string $name = '';
    public $currentDate;
    public $startDate;
    public $endDate;
    public $products;
    public $clientCategories;
    public int $clientCategoryId = 1;
    public int $priceHeaderId = 0;
    public $priceLines = [];

    public function mount()
    {
        $this->currentDate = Carbon::today()->format('Y-m-d'); 
        $this->startDate =  $this->currentDate; 
        $this->products = Product::all();
        $this->clientCategories = ClientCategory::all();

        $this->updatedClientCategoryId();
    }

    public function updatedClientCategoryId()
    {
        $priceHeader = PriceHeader::where('clientCategoryId', $this->clientCategoryId)
               ->whereNull('endDate')
               ->first();

        $this->priceHeaderId = 0;
        if($priceHeader != null){
            $this->priceHeaderId = $priceHeader->id;
        }

        $this->priceLines = DB::select('SELECT p.id AS productId, p.name, c.name AS category FROM products p INNER JOIN product_categories c ON p.categoryId = c.id ORDER BY c.name, p.name;');
        foreach ($this->priceLines as $item) {
            $line = PriceLine::where('price_header_id', $this->priceHeaderId)
            ->where('productId', $item->productId)
            ->first();

            $item->price = $line->price ?? 0;
        }
    }

    public function createPrice()
    {
        
        if($this->startDate < $this->currentDate){
            toastr()->error('Effective date must be from today', 'Sorry', ['positionClass' => 'toast-top-center']);
            return;
        }

        $priceHeader = DB::table('price_headers')
            ->where('clientCategoryId', $this->clientCategoryId)
            ->whereNull('endDate')
            ->update(['endDate' => $this->startDate]);

        $price = PriceHeader::create([
            'name' => $this->name,
            'currency' => '',
            'startDate' => $this->startDate,
            'clientCategoryId' => $this->clientCategoryId,
        ]);

        foreach ($this->priceLines as $item) {
            $price->priceLines()->create([
                'productId' => $item->productId,
                'price' => $item->price,
            ]);
        }

        $this->redirect(env('APP_ROOT').'prices');
    }

    public function render()
    {
        return view('livewire.price-new');
    }
}
