<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoryNew extends Component
{
    public string $name = '';
    public $id;

    public function createCategory()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        ProductCategory::create($validated);
        toastr()->success('Category created successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'product-categories');
    }

    public function render()
    {
        return view('livewire.product-category-new');
    }
}
