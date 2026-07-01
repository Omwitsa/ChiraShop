<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoryList extends Component
{
    public $categories;
    public function mount()
    {
        if(!auth()->guard('web')->check()){
           return redirect('login');
        }
        
        $this->categories = ProductCategory::all();
    }
    
    public function edit($id){
        $this->redirectRoute('edit-product-category', ['id' => $id]);
    }

    public function delete($id){
        $category = ProductCategory::find($id);
        $category->delete();
        toastr()->success('Category deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'product-categories');
    }

    public function render()
    {
        return view('livewire.product-category-list')->with([
            'categories' => $this->categories,
        ]);
    }
}
