<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Variety;
use App\Models\MixBox;
use Illuminate\Support\Facades\DB;

class NewMixedBox extends Component
{
    public $varieties;
    public $categories;
    public string $name = '';
    public string $Category = '';
    public string $length = '';

    public $LineItems = [];

    public function mount()
    {
        $this->varieties = Variety::all();
        $this->categories = DB::select("SELECT * FROM categories WHERE name != 'MIXED BOX'");
    }

    public function addBox()
    {
        $this->LineItems[] = ['variety' => '', 'stems' => 1];
    }

    public function removeLineItems($index)
    {
        unset($this->LineItems[$index]);
    }

    public function createMixedBox()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'Category' => ['required', 'string', 'max:100'],
            'length' => ['required', 'string', 'max:20'],
        ]);

        $mixedBox = MixBox::create($validated);
        foreach ($this->LineItems as $item) {
            $mixedBox->mixBoxLines()->create($item);
        }

        $this->redirect(env('APP_ROOT').'list-mixed-box');
    }

    public function render()
    {
        return view('livewire.new-mixed-box');
    }
}
