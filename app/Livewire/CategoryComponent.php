<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $categories;
    public function mount()
    {
        // $this->categories = Category::all();
        $this->categories = DB::select("SELECT * FROM categories WHERE Active = true ORDER BY id DESC");
        // $this->subCategories = DB::select('SELECT * FROM sub_categories WHERE Category = ?', [$this->Category]);
    }
    public function render()
    {
        return view('livewire.category-component');
    }
}
