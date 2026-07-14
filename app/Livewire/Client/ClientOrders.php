<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\DB;

class ClientOrders extends Component
{
    public $orders;
    public function mount()
    {
        $user = auth()->guard('client')->user();
        if(!auth()->guard('client')->check()){
           return redirect('login');
        }

        $this->orders = DB::select('SELECT * FROM orderheader WHERE clientId = ?', [$user->id]);
    }

    public function details($id){
        $this->redirectRoute('my-order-view', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.client.client-orders');
    }
}
