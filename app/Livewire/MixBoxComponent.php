<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MixBox;

class MixBoxComponent extends Component
{
    public $boxes;
    public function mount()
    {
        $this->boxes = MixBox::all();
    }

    public function render()
    {
        return view('livewire.mix-box-component')->with([
            'boxes' => $this->boxes,
        ]);
    }
}
