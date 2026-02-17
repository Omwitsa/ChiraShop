<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\dropoff;

class NewDropoff extends Component
{
    public string $name = '';


    public function creatDropoff()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        dropoff::create($validated);
        $this->redirect(env('APP_ROOT').'dropoffs');
    }

    public function render()
    {
        return view('livewire.new-dropoff');
    }
}
