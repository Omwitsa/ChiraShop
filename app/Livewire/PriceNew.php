<?php

namespace App\Livewire;

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
    public $priceLines = [];

    public function mount()
    {
        $this->products = Product::all();
        $this->clientCategories = ClientCategory::all();
    }

    public function updatedClientCategoryId()
    {
        $this->priceLines = DB::select('SELECT p.id, p.name, l.price, p.category FROM products p LEFT JOIN price_lines l ON p.id = l.productId LEFT JOIN price_headers h ON l.price_header_id = h.id WHERE clientCategoryId = ? ORDER BY p.category, p.name', [$this->clientCategoryId]);
        if (PriceHeader::where('clientCategoryId', $this->clientCategoryId)->doesntExist()) {
            $this->priceLines = DB::select('SELECT p.id, p.name, l.price, p.category FROM products p LEFT JOIN price_lines l ON p.id = l.productId LEFT JOIN price_headers h ON l.price_header_id = h.id ORDER BY p.category, p.name');
        }

        foreach ($this->priceLines as $item) {
            $item->price = 0;
        }
    }

    public function createPrice()
    {
        dd($this->priceLines);
        // $validated = $this->validate([
        //     'Name' => ['required', 'string', 'max:100'],
        //     'Currency' => ['required', 'string', 'max:20'],
        // ]);

        // $price = PriceHeader::create($validated);
        // foreach ($this->priceLines as $item) {
        //     $price->priceLines()->create($item);
        // }

        // $this->redirect(env('APP_ROOT').'prices');
    }

    public function render()
    {
        return view('livewire.price-new');
    }
}
