<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\dropoff;

class EditDropOff extends Component
{
    public string $name = '';
    public $active;
    public $dropoff;

    public function mount($id)
    {
        $this->dropoff = dropoff::find($id);
        $this->name = $this->dropoff->name;
        $this->active = $this->dropoff->active === 1;
    }

    public function UpdateDropOff()
    {
        $this->dropoff->name = $this->name;
        $this->dropoff->active = $this->active;
        $this->dropoff->save();

        toastr()->success('Dropoff updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'dropoffs');
    }

    public function render()
    {
        return view('livewire.edit-drop-off');
    }
}
