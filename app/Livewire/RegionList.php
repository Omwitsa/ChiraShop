<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Region;

class RegionList extends Component
{
    public $regions;
    public function mount()
    {
        $this->regions = Region::all();
    }
    
    public function edit($id){
        $this->redirectRoute('edit-region', ['id' => $id]);
    }

    public function delete($id){
        $region = Region::find($id);
        $region->delete();
        toastr()->success('Region deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'regions');
    }

    public function render()
    {
        return view('livewire.region-list')->with([
            'regions' => $this->regions,
        ]);
    }
}
