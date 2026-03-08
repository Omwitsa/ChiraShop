<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;

class CourseNew extends Component
{
    public string $name = '';
    public $id;

    public function createCourse()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        Courses::create($validated);
        toastr()->success('Course created successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'courses');
    }

    public function render()
    {
        return view('livewire.course-new');
    }
}
