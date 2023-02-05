<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;

class CurriculumShow extends Component
{
    public $curriculum;

    public function render()
    {
        return view('livewire.curriculum-show', [
            'curriculum' => $this->curriculum
        ]);
    }

    public function attendance($student_id){
        Attendance::create([
            'curriculum_id' => $this->curriculum->id,
            'user_id' => $student_id
        ]);

        flash()->addSuccess("User attendance done!");
    }
}
