<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculumIndex extends Component
{
    public $curriculums;
    public function render()
    {
        return view('livewire.curriculum-index');
    }
}
