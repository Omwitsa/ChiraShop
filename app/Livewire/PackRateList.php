<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PackRateHeader;

class PackRateList extends Component
{
    public $packrates;
    public function mount()
    {
        $this->packrates = PackRateHeader::all();
    }

    public function render()
    {
        return view('livewire.pack-rate-list')->with([
            'packrates' => $this->packrates,
        ]);
    }
}
