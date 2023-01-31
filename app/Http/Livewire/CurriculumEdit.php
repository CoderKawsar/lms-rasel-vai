<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use App\Models\Curriculum;
use App\Models\Note;
use Livewire\Component;

class CurriculumEdit extends Component
{
    public $curriculum;
    public $curriculum_name;
    public $student_name;
    public $student_email;
    public $editedNote;

    public function mount(){
        $this->curriculum_name = $this->curriculum->name;
    }

    protected $listeners = [
        'updateNote' => 'noteUpdated'
    ];

    public function render()
    {
        return view('livewire.curriculum-edit');
    }

    public function changeCurriculumName(){
        $this->curriculum->name = $this->curriculum_name;
        $this->curriculum->save();

        flash()->addSuccess('Curriculum/Class name changed!');
    }

    public function attendance($student_id){
        $attendance = Attendance::where('user_id', $student_id)->where('curriculum_id', $this->curriculum->id)->first();

        if($attendance == null){
            Attendance::create([
                'curriculum_id' => $this->curriculum->id,
                'user_id' => $student_id
            ]);
            $this->refreshPage();
        }else{
            $attendance->delete();
            $this->refreshPage();
        }
        flash()->addSuccess("Attendance updated!");
    }

    public function noteUpdated(){
        $this->refreshPage();
    }

    public function editNote($id){
        $note = Note::findOrFail($id);
    }

    public function refreshPage(){
        return redirect()->route('class.edit', $this->curriculum->id);
    }
}
