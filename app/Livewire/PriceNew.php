<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PriceHeader;
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
        $this->priceLines = DB::select('SELECT p.id, h.id AS priceHeaderId, p.id AS productId, p.name, l.price, p.category FROM products p LEFT JOIN price_lines l ON p.id = l.productId LEFT JOIN price_headers h ON l.price_header_id = h.id WHERE endDate IS NULL AND clientCategoryId = ? ORDER BY p.category, p.name', [$this->clientCategoryId]);
        if (PriceHeader::where('clientCategoryId', $this->clientCategoryId)->doesntExist()) {
            $this->priceLines = DB::select('SELECT p.id, h.id AS priceHeaderId, p.id AS productId, p.name, l.price, p.category FROM products p LEFT JOIN price_lines l ON p.id = l.productId LEFT JOIN price_headers h ON l.price_header_id = h.id ORDER BY p.category, p.name');
        }
        
        foreach ($this->priceLines as $item) {
            $item->price = $item->price ?? 0;
            $this->priceHeaderId =  $item->priceHeaderId ?? 0;
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
