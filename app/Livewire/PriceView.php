<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PriceHeader;
use App\Models\PriceLine;
use App\Models\ClientCategory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PriceView extends Component
{
    public string $name = '';
    public int $clientCategoryId = 1;
    public $priceHeader;
    public $clientCategories;
    public $startDate;
    public $priceLines = [];

    public function mount($id)
    {
        $this->clientCategories = ClientCategory::all();
        $this->priceHeader = PriceHeader::find($id);
        $this->name = $this->priceHeader->name;
        $this->clientCategoryId = $this->priceHeader->clientCategoryId;
        $this->startDate = Carbon::parse($this->priceHeader->startDate)->format('Y-m-d');

        $this->priceLines = DB::select('SELECT p.id AS productId, p.name, c.name AS category FROM products p INNER JOIN product_categories c ON p.categoryId = c.id ORDER BY c.name, p.name;');
        foreach ($this->priceLines as $item) {
            $line = PriceLine::where('price_header_id', $id)
            ->where('productId', $item->productId)
            ->first();

            $item->price = $line->price ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.price-view');
    }
}
