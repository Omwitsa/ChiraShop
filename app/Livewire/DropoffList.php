<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\dropoff;

class DropoffList extends Component
{
    public $dropoffs;
    public function mount()
    {
        $this->dropoffs = dropoff::all();
    }

    public function edit($id){
        $this->redirectRoute('edit-dropoff', ['id' => $id]);
    }

    public function delete($id){
        $dropoff = dropoff::find($id);
        $dropoff->delete();
        toastr()->success('Dropoff deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'dropoffs');
    }

    public function render()
    {
        return view('livewire.dropoff-list')->with([
            'dropoffs' => $this->dropoffs,
        ]);
    }
}
