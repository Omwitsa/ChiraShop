<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Region;

class NewRegion extends Component
{
    public string $name = '';
    public $id;

    public function createRegion()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        Region::create($validated);
        toastr()->success('Region created successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'regions');
    }

    public function render()
    {
        return view('livewire.new-region');
    }
}
