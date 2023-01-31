<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CourseEdit extends Component
{
    public $course;
    public function render()
    {
        return view('livewire.course-edit');
    }

    public function deleteClass($id){
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();
        return redirect()->route('course.edit', [
            'course' => $this->course
        ]);
    }
}
