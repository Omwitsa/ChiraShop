<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoryEdit extends Component
{
    public string $name = '';
    public $sortOrder = 0;
    public $active;
    public $category;

    public function mount($id)
    {
        $this->category = ProductCategory::find($id);
        $this->name = $this->category->name;
        $this->sortOrder = $this->category->sortOrder;
        $this->active = $this->category->active === 1;
    }

    public function UpdateCategory()
    {
        $this->category->name = $this->name;
        $this->category->sortOrder = $this->sortOrder;
        $this->category->active = $this->active;
        $this->category->save();

        toastr()->success('Category updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'product-categories');
    }

    public function render()
    {
        return view('livewire.product-category-edit');
    }
}
