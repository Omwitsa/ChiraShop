<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PriceHeader;

class PriceList extends Component
{
    public $prices;
    public function mount()
    {
        $this->prices = PriceHeader::all();
    }

    public function render()
    {
        return view('livewire.price-list')->with([
            'prices' => $this->prices,
        ]);
    }
}
