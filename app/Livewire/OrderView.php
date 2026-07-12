<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderHeader;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPdf\Facades\Pdf;

class OrderView extends Component
{
    public $orderId = 101;
    public $total = 1500;

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

    public function print1()
    {
        // 1. Generate the PDF and get it as a base64 encoded string
        $base64Content = Pdf::view('reports.orders', ['order' => $this->order, 'orderItems' => $this->orderItems])
            ->format('a4')
            ->base64(); // <-- This extracts the base64 string

        // 2. Return it by decoding it inside Livewire's stream download
        return response()->streamDownload(function () use ($base64Content) {
            echo base64_decode($base64Content);
        }, 'invoice.pdf');
    }

    public function print()
    {
        // 1. Generate the PDF and get it as a base64 encoded string
        $base64Content = Pdf::view('reports.orders', ['order' => $this->order, 'orderItems' => $this->orderItems])
            ->format('a4')
            ->base64(); // <-- This extracts the base64 string

        // 2. Return it by decoding it inside Livewire's stream download
        return response()->streamDownload(function () use ($base64Content) {
            echo base64_decode($base64Content);
        }, 'invoice.pdf');
    }

    public function render()
    {
        return view('livewire.order-view');
    }
}
