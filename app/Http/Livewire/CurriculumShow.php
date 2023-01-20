<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Curriculum;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CurriculumShow extends Component
{
    public $curriculum_id;
    public $note;

    public function render()
    {
        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        return view('livewire.curriculum-show', [
            'curriculum' => $curriculum
        ]);
    }

    public function addNote(){
        $note = Note::create([
           'description' => $this->note
        ]);

        $curriculum = Curriculum::findOrFail($this->curriculum_id);
        $curriculum->notes()->attach($note);

        $this->note = '';

        flash()->addSuccess("Note added successfully!");
    }

    public function attendance($student_id){
        Attendance::create([
            'curriculum_id' => $this->curriculum_id,
            'user_id' => $student_id
        ]);

        flash()->addSuccess("User attendance done!");
    }
}
