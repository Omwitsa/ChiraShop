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
    public $startDate;
    public $endDate;
    public $products;
    public $clientCategories;
    public int $clientCategoryId = 1;
    public int $priceHeaderId = 0;
    public $priceLines = [];

    public function mount()
    {
        $this->startDate = Carbon::today()->format('Y-m-d'); 
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

        $this->priceLines = DB::select('SELECT id AS productId, name, category FROM products ORDER BY category, name;');
        foreach ($this->priceLines as $item) {
            $line = PriceLine::where('price_header_id', $this->priceHeaderId)
            ->where('productId', $item->productId)
            ->first();

            $item->price = $line->price ?? 0;
        }
    }

    public function createPrice()
    {
        $priceHeader = DB::table('price_headers')
            ->where('id', $this->priceHeaderId)
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
