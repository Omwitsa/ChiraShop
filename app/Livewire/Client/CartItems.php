<?php

namespace App\Livewire\Client;

use App\Constants\Enums\ClientGroups;
use Livewire\Component;
use App\Models\OrderHeader;
use stdclass;

class CartItems extends Component
{
    public $cartItems;
    public $orderHeader;

    public function mount()
    {
        $this->orderHeader['shipping'] = 0;
        $this->cartItems = session('cartItems'); 
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
        $total = collect($this->cartItems)->sum('price');
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

        // return redirect(request()->header('Referer'));
    }

    public function decrement($index)
    {
        // $variety = $this->subCategories[$index]->varieties[$v_index];
        // $variety->quantity--;
        // $variety->quantity = $variety->quantity < 1 ? 1 : $variety->quantity;
    }
}
