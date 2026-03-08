<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Courses;

class CourseList extends Component
{
    public $courses;
    public function mount()
    {
        $this->courses = Courses::all();
    }
    
    public function edit($id){
        $this->redirectRoute('edit-course', ['id' => $id]);
    }

    public function delete($id){
        $course = Courses::find($id);
        $course->delete();
        toastr()->success('Course deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'courses');
    }

    public function render()
    {
        return view('livewire.course-list')->with([
            'courses' => $this->courses,
        ]);
    }
}
