<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\DB;

class Orders extends Component
{
    public $orders;
    public function mount()
    {
        if(!auth()->guard('web')->check()){
           return redirect('login');
        }
        
        $this->orders = DB::select('SELECT o.id, o.orderDate, o.status, o.amount, o.dateCreated, c.name FROM orderheader o INNER JOIN clients c ON o.clientId = c.id ORDER BY dateCreated DESC');
    }

    public function details($id){
        $this->redirectRoute('order-view', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.orders')->with([
            'orders' => $this->orders,
        ]);
    }
}
