<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculumCreate extends Component
{
    public $course_id;
    public $curriculum_name;
    public $day;
    public $class_time;
    public $weekdays = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'sunday'];

    public function render()
    {
        return view('livewire.curriculum-create');
    }

    public function addCurriculum(){
        Curriculum::create([
            'name' => $this->curriculum_name,
            'week_day' => $this->day,
            'class_time' => $this->class_time,
            'course_id' => $this->course_id
        ]);

        $this->curriculum_name = '';
        $this->day = '';
        $this->class_time = '';

        flash()->addSuccess('Class added successfully');

    }
}
