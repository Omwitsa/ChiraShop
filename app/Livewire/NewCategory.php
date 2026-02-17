<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class NewCategory extends Component
{
    use WithFileUploads;
    public string $name = '';
    public string $farm = '';
    #[Validate('image|max:1024')] // 1MB Max
    public $file;
    

    public function creatCategory()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'farm' => ['required', 'string', 'max:255'],
            'file' => 'image|max:1024', // 1MB Max
        ]);

        // $name = $this->file->hashName(); // Generate a unique, random name...
        // $extension = $this->file->extension(); // Determine the file's extension based on the file's MIME type...

        // $name = $this->file->getClientOriginalName();
        // $extension = $this->file->getClientOriginalExtension();

        $name = time().'-'.$this->file->getClientOriginalName();
        $path = $this->file->storeAs('images', $name, 'public');
        $validated['picUrl'] = $path;
        Category::create($validated);
        $this->redirect(env('APP_ROOT').'categories');
    }

    public function render()
    {
        return view('livewire.new-category');
    }
}
