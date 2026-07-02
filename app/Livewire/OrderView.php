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
        $results = DB::select('SELECT o.id, o.orderDate, o.receivingDate, o.amount, o.lineTotal, c.name FROM orderheader o INNER JOIN clients c ON o.clientId = c.id WHERE o.id = ' .$id. ';');
        $this->order = $results[0];
        $this->orderItems = DB::select('SELECT l.id, l.unit_price, l.orderQuantity, l.discount, l.tax, p.name, p.barcode FROM orderline l INNER JOIN products p ON l.productId = p.id WHERE l.order_header_id = '. $id .' ORDER BY p.categoryId, p.name;');
        foreach ($this->orderItems as $item) {
            $item->lineTotal = $item->unit_price * $item->orderQuantity;
        }
    }

    public function print()
    {
        dd("Willy");
    }

    public function render()
    {
        return view('livewire.order-view');
    }
}
