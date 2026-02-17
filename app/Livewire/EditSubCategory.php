<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class EditSubCategory extends Component
{
    use WithFileUploads;
    public $subCategory;
    public $categories;
    public string $Name = '';
    public string $HeadSize = '';
    public string $Category = 'AAA ROSES';
    #[Validate('image|max:1024')] // 1MB Max
    public $file;
    public $active;

    public function mount($id)
    {
        $this->categories = DB::select("SELECT * FROM categories WHERE name != 'MIXED BOX'");
        $this->subCategory = SubCategory::find($id);
        $this->Name = $this->subCategory->Name;
        $this->HeadSize = $this->subCategory->HeadSize;
        $this->Category = $this->subCategory->Category;
        $this->picUrl = $this->subCategory->picUrl;
        $this->active = $this->subCategory->active === 1;
    }

    public function updateSubCategory()
    {
        if($this->file){
            $name = time().'-'.$this->file->getClientOriginalName();
            $path = $this->file->storeAs('images', $name, 'public');
            $this->subCategory->picUrl = $path;
        }

        $this->subCategory->Name = $this->Name;
        $this->subCategory->HeadSize = $this->HeadSize;
        $this->subCategory->Category = $this->Category;
        $this->subCategory->active = $this->active;
        $this->subCategory->save();

        toastr()->success('Sub-category updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'sub-categories');
    }
    public function render()
    {
        return view('livewire.edit-sub-category');
    }
}
