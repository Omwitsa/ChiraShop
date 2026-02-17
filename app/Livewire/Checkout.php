<?php

namespace App\Livewire;

use Livewire\Component;

class Checkout extends Component
{
    public $boxes;
    public $stemsPerBunch = 10;
    public $amount = 500;
    public function mount()
    {
        $this->boxes = session('boxes');
    }

    public function delete($box_index){
        unset($this->boxes[$box_index]);
        session(['boxes' => $this->boxes]);
        toastr()->success('Box deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'checkout');
    }

    public function render()
    {
        return view('livewire.checkout')->with([
            'boxes' => $this->boxes,
        ]);
    }
}
