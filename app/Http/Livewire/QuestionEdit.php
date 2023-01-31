<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionEdit extends Component
{
    public $question_id;

    public $question_name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer;

    public function mount(){
        $question = Question::findOrFail($this->question_id);
        $this->question_name = $question->name;
        $this->answer_a = $question->answer_a;
        $this->answer_b = $question->answer_b;
        $this->answer_c = $question->answer_c;
        $this->answer_d = $question->answer_d;
        $this->correct_answer = $question->correct_answer;
    }

    public function render()
    {
        $question = Question::findOrFail($this->question_id);
        return view('livewire.question-edit', [
            'question' => $question
        ]);
    }

    public function editQuestion(){
        $question = Question::findOrFail($this->question_id);
        $question->update([
            'name' => $this->question_name,
            'answer_a' => $this->answer_a,
            'answer_b' => $this->answer_b,
            'answer_c' => $this->answer_c,
            'answer_d' => $this->answer_d,
            'correct_answer' => $this->correct_answer
        ]);

        flash()->addSuccess('Question updated successfully!');
        return redirect()->route('question.index');
    }
}
