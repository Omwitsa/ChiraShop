<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Region;

class EditRegion extends Component
{
    public string $name = '';
    public $active;
    public $region;

    public function mount($id)
    {
        $this->region = Region::find($id);
        $this->name = $this->region->name;
        $this->active = $this->region->active === 1;
    }

    public function UpdateRegion()
    {
        $this->region->name = $this->name;
        $this->region->active = $this->active;
        $this->region->save();

        toastr()->success('Region updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'regions');
    }

    public function render()
    {
        return view('livewire.edit-region');
    }
}
