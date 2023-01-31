<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CourseShow extends Component
{
    public $course;
    public function render()
    {
        return view('livewire.course-show');
    }

    public function deleteClass($id){
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();
        return redirect()->route('course.show', [
            'course' => $this->course
        ]);
    }
}
