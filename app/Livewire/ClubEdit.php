<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Club;

class ClubEdit extends Component
{
    public string $name = '';
    public $active;
    public $club;

    public function mount($id)
    {
        $this->club = Club::find($id);
        $this->name = $this->club->name;
        $this->active = $this->club->active === 1;
    }

    public function UpdateClub()
    {
        $this->club->name = $this->name;
        $this->club->active = $this->active;
        $this->club->save();

        toastr()->success('Club updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clubs');
    }

    public function render()
    {
        return view('livewire.club-edit');
    }
}
