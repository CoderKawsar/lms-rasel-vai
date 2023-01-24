<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizShow extends Component
{
    public $quiz;
    public $answer;
    public $answered = [];
    public function render()
    {
        return view('livewire.quiz-show');
    }

    public function check(){
        $question_id = explode(',', $this->answer)[1];
        $question = Question::findOrFail($question_id);
        $this->answered[] = $question->id;

        if($question->correct_answer == explode(',',$this->answer)[0]){
            flash()->addSuccess('Correct Answer');
            $correct = true;
        }else{
            flash()->addError('Wrong Answer!');
            $correct = false;
        }

        $this->answered[$question->id] = $correct;
    }
}
