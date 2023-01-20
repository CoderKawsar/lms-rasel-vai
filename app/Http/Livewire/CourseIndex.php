<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseIndex extends Component
{
    public function render()
    {
        $courses = Course::paginate(10);
        return view('livewire.course-index', [
            'courses' => $courses
        ]);
    }

    public function delete($id){
        $course = Course::findOrFail($id);
        $course->delete();

        flash()->addSuccess('Course Deleted Successfully!');
    }
}
