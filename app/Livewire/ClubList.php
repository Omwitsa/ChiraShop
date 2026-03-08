<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Club;

class ClubList extends Component
{
    public $clubs;
    public function mount()
    {
        $this->clubs = Club::all();
    }
    
    public function edit($id){
        $this->redirectRoute('edit-club', ['id' => $id]);
    }

    public function delete($id){
        $club = Club::find($id);
        $club->delete();
        toastr()->success('Club deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clubs');
    }

    public function render()
    {
        return view('livewire.club-list')->with([
            'clubs' => $this->clubs,
        ]);
    }
}
