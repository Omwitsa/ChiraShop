<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PackRateHeader;
use App\Models\Variety;

class NewPackRate extends Component
{
    public $varieties;
    public string $Name = '';

    public $packrateLines = [];

    public function mount()
    {
        $this->varieties = Variety::all();
    }

    public function addPackRateLine()
    {
        $this->packrateLines[] = ['variety' => '', 'len35' => 0, 'len40' => 0, 'len50' => 0, 'len60' => 0, 'len70' => 0, 'len80' => 0, 'len90' => 0, 'len100' => 0];
    }

    public function removePackRateLine($index)
    {
        unset($this->packrateLines[$index]);
    }

    public function createPackRate()
    {
        $validated = $this->validate([
            'Name' => ['required', 'string', 'max:100'],
        ]);

        $packRate = PackRateHeader::create($validated);
        foreach ($this->packrateLines as $item) {
            $packRate->packRateLines()->create($item);
        }

        $this->redirect(env('APP_ROOT').'packrates');
    }

    public function render()
    {
        return view('livewire.new-pack-rate');
    }
}
