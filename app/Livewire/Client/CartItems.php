<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\OrderHeader;
use stdclass;

class CartItems extends Component
{
    public $cartItems;
    public $orderHeader;
    public $client;

    public function mount()
    {
        $this->orderHeader['shipping'] = 0;
        $this->cartItems = session('cartItems'); 
        $this->client = auth()->guard('client')->user();
        $this->calculateOrderValue();
    }

    public function delete($index){
        unset($this->cartItems[$index]);
        session(['cartItems' => $this->cartItems]);
        toastr()->success('Item deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        if(empty($this->cartItems)){
            $this->redirect(env('APP_ROOT').'shop');
        }
        else{
            $this->redirect(env('APP_ROOT').'cart-items');
        }
    }

    public function onEnterQuantity($index, $value)
    {
        $item = $this->cartItems[$index];
        $item->subTotal = $item->price * $item->quantity;
        $this->calculateOrderValue();
    }

    public function calculateOrderValue()
    {
        $this->orderHeader['subTotal'] = 0;
        foreach ($this->cartItems as $key => $item) {
            $this->orderHeader['subTotal'] += $item->subTotal;
        }

        $this->orderHeader['total'] = $this->orderHeader['subTotal'] + $this->orderHeader['shipping'];
    }

    public function render()
    {
        // dd($this->cartItems);
        return view('livewire.client.cart-items');
    }

    public function increment($index)
    {
        // $variety = $this->subCategories[$index]->varieties[$v_index];
        // $variety->quantity++;
    }

    public function order()
    {
        $total = collect($this->cartItems)->sum('subTotal');
        $order = OrderHeader::create([
            'clientId' => $this->client->id,
            'orderDate' => date('Y-m-d', time()),
            'receivingDate' => date('Y-m-d', time()),
            'status' => '1',
            'lpo' => '',
            'dropOff' => '',
            'lineTotal' => $total,
            'amount' => $total,
        ]);

        foreach ($this->cartItems as $item) {
            $item->order_header_id = $order->id;
            // $order->orderLines()->create((array)$item);
            $orderedItem = [
                'order_header_id' => $order->id,
                'productId' => $item->id,
                'orderQuantity' => $item->quantity,
                'price' => $item->price,
                'notes' => ''
            ];

            $order->orderLines()->create($orderedItem);
        }

        $header = new stdClass();
        $header->clientName = $this->client->name;
        $header->total = $total;
        $header->lines = $this->cartItems;

        Mail::to($this->client->emailRecepients)->send(new OrderNotification($header));
        Session::forget('cartItems');
        toastr()->success('Your order has been submitted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'shop');
    }

    public function decrement($index)
    {
        // $variety = $this->subCategories[$index]->varieties[$v_index];
        // $variety->quantity--;
        // $variety->quantity = $variety->quantity < 1 ? 1 : $variety->quantity;
    }
}
