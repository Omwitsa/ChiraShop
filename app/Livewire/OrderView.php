<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\DB;

class OrderView extends Component
{
    public $order;
    public $orderItems;
    public function mount($id)
    {
        // $this->order->orderLines()
        $this->order = OrderHeader::find($id);
        $this->orderItems = DB::select('SELECT l.id, l.unit_price, l.orderQuantity, l.discount, l.tax, p.name, p.barcode FROM orderline l INNER JOIN products p ON l.productId = p.id WHERE l.order_header_id = '. $id .' ORDER BY p.categoryId, p.name;');
        foreach ($this->orderItems as $item) {
            $item->lineTotal = $item->unit_price * $item->orderQuantity;
        }
    }

    public function render()
    {
        return view('livewire.order-view');
    }
}
