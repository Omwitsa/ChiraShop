<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategory;

class SubCategoryList extends Component
{
    public $subCategories;
    public function mount()
    {
        $this->subCategories = SubCategory::all();
    }

    public function edit($id){
        $this->redirectRoute('edit-sub-category', ['id' => $id]);
    }

    public function delete($id){
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        toastr()->success('Sub Category deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'sub-categories');
    }
    

    public function render()
    {
        return view('livewire.sub-category-list')->with([
            'subCategories' => $this->subCategories,
        ]);
    }
}
