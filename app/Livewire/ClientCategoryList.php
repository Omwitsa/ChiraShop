<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClientCategory;

class ClientCategoryList extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = ClientCategory::all();
    }

    public function edit($id){
        $this->redirectRoute('edit-client-cat', ['id' => $id]);
    }

    public function delete($id){
        $region = ClientCategory::find($id);
        $region->delete();
        toastr()->success('Category deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'client-categories');
    }

    public function render()
    {
        return view('livewire.client-category-list')->with([
            'categories' => $this->categories,
        ]);
    }
}
