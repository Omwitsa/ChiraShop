<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderHeader;

class Orders extends Component
{
    public $orders;
    public function mount()
    {
        $this->orders = OrderHeader::all();
    }

    public function render()
    {
        return view('livewire.orders')->with([
            'orders' => $this->orders,
        ]);
    }
}
