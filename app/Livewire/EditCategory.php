<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class EditCategory extends Component
{
    use WithFileUploads;
    public string $name = '';
    public string $farm = '';
    #[Validate('image|max:1024')] // 1MB Max
    public $file;
    #[Validate('image|max:1024')]
    public $name_url;
    public $active;
    public $category;

    public function mount($id)
    {
        $this->category = Category::find($id);
        $this->name = $this->category->name;
        $this->farm = $this->category->farm;
        $this->picUrl = $this->category->picUrl;
        $this->nameUrl = $this->category->nameUrl;
        $this->active = $this->category->active === 1;
    }

    public function UpdateCategory()
    {
        if($this->file){
            $name = time().'-'.$this->file->getClientOriginalName();
            $path = $this->file->storeAs('images', $name, 'public');
            $this->category->picUrl = $path;
        }
        if($this->name_url){
            $name = time().'-'.$this->name_url->getClientOriginalName();
            $path = $this->name_url->storeAs('images', $name, 'public');
            $this->category->nameUrl = $path;
        }
        
        $this->category->name = $this->name;
        $this->category->farm = $this->farm;
        $this->category->active = $this->active;
        $this->category->save();

        toastr()->success('Category updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'categories');
    }

    public function render()
    {
        return view('livewire.edit-category');
    }
}
