<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClientCategory;

class EditClientCategory extends Component
{
    public string $name = '';
    public $active;
    public $category;
    public function mount($id)
    {
        $this->category = ClientCategory::find($id);
        $this->name = $this->category->name;
        $this->active = $this->category->active === 1;
    }

    public function UpdateCategory()
    {
        $this->category->name = $this->name;
        $this->category->active = $this->active;
        $this->category->save();

        toastr()->success('Category updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'client-categories');
    }

    public function render()
    {
        return view('livewire.edit-client-category');
    }
}
