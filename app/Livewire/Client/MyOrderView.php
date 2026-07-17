<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPdf\Facades\Pdf;

class MyOrderView extends Component
{
    public $order;
    public $orderItems;
    public $client;
    public function mount($id)
    {
        $this->client = auth()->guard('client')->user();
        $results = DB::select('SELECT * FROM orderheader WHERE id = ' .$id. ';');
        $this->order = $results[0];
        $this->orderItems = DB::select('SELECT l.id, l.unit_price, l.orderQuantity, l.discount, l.tax, p.name, p.barcode FROM orderline l INNER JOIN products p ON l.productId = p.id WHERE l.order_header_id = '. $id .' ORDER BY p.categoryId, p.name;');
        foreach ($this->orderItems as $item) {
            $item->lineTotal = $item->unit_price * $item->orderQuantity;
        }
    }

    public function print()
    {
        // 1. Generate the PDF and get it as a base64 encoded string
        $base64Content = Pdf::view('reports.client-orders', ['order' => $this->order, 'orderItems' => $this->orderItems, 'client' => $this->client])
            ->format('a4')
            ->base64(); // <-- This extracts the base64 string

        // 2. Return it by decoding it inside Livewire's stream download
        return response()->streamDownload(function () use ($base64Content) {
            echo base64_decode($base64Content);
        }, "order-{$this->order->orderDate}.pdf");
    }

    public function render()
    {
        return view('livewire.client.my-order-view');
    }
}
