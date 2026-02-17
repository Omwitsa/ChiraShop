<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Variety;

class VarietyComponent extends Component
{
    public $varieties;
    public function mount()
    {
        $this->varieties = Variety::all();
    }

    public function edit($id){
        $this->redirectRoute('edit-variety', ['id' => $id]);
    }

    public function delete($id){
        $region = Variety::find($id);
        $region->delete();
        toastr()->success('Variety deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'varieties');
    }

    public function render()
    {
        return view('livewire.variety-component')->with([
            'varieties' => $this->varieties,
        ]);
    }
}
