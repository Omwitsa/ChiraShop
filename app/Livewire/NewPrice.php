<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PriceHeader;
use App\Models\Variety;

class NewPrice extends Component
{
    public $varieties;
    public string $Name = '';
    public string $Currency = '';

    public $priceLines = [];

    public function mount()
    {
        $this->varieties = Variety::all();
    }

    public function addPriceLine()
    {
        $this->priceLines[] = ['variety' => '', 'len35' => 0, 'len40' => 0, 'len50' => 0, 'len60' => 0, 'len70' => 0, 'len80' => 0, 'len90' => 0, 'len100' => 0];
    }

    public function removePriceLine($index)
    {
        unset($this->priceLines[$index]);
    }

    public function createPrice()
    {
        $validated = $this->validate([
            'Name' => ['required', 'string', 'max:100'],
            'Currency' => ['required', 'string', 'max:20'],
        ]);

        $price = PriceHeader::create($validated);
        foreach ($this->priceLines as $item) {
            $price->priceLines()->create($item);
        }

        $this->redirect(env('APP_ROOT').'prices');
    }

    public function render()
    {
        return view('livewire.new-price');
    }
}
