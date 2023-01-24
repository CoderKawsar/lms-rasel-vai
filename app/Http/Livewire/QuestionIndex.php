<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuestionIndex extends Component
{
    public function render()
    {
        $questions = Question::paginate(10);
        return view('livewire.question-index', [
            'questions' => $questions
        ]);
    }
}
