<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClientCategory;

class NewClientCategory extends Component
{
    public string $name = '';


    public function creatCategory()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        ClientCategory::create($validated);
        $this->redirect(env('APP_ROOT').'client-categories');
    }

    public function render()
    {
        return view('livewire.new-client-category');
    }
}
