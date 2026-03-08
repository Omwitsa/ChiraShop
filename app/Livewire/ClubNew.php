<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Club;

class ClubNew extends Component
{
    public string $name = '';
    public $id;

    public function createClub()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        Club::create($validated);
        toastr()->success('Club created successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clubs');
    }

    public function render()
    {
        return view('livewire.club-new');
    }
}
