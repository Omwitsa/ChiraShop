<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;

class CourseEdit extends Component
{
    public string $name = '';
    public $active;
    public $course;

    public function mount($id)
    {
        $this->course = Courses::find($id);
        $this->name = $this->course->name;
        $this->active = $this->course->active === 1;
    }

    public function UpdateCourse()
    {
        $this->course->name = $this->name;
        $this->course->active = $this->active;
        $this->course->save();

        toastr()->success('Course updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'courses');
    }

    public function render()
    {
        return view('livewire.course-edit');
    }
}
