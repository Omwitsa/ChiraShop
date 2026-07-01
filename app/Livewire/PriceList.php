<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PriceHeader;
use Illuminate\Support\Facades\DB;

class PriceList extends Component
{
    public $prices;
    public function mount()
    {
        if(!auth()->guard('web')->check()){
           return redirect('login');
        }
        
        $this->prices = DB::select('SELECT h.id, h.name, h.startDate, h.endDate, c.name AS category FROM price_headers h INNER JOIN client_categories c ON h.clientCategoryId = c.id;');
    }

    public function details($id){
        $this->redirectRoute('price-view', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.price-list')->with([
            'prices' => $this->prices,
        ]);
    }
}
