<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\Note;
use Livewire\Component;

class AddNote extends Component
{
    public $note;
    public $attachmentModelType;
    public $modelId;
    public function render()
    {
        return view('livewire.add-note');
    }

    public function emitEvent() {
        $this->emit('updateNote');
    }

    public function addNote(){
        $note = Note::create([
           'description' => $this->note
        ]);

        if($this->attachmentModelType == 'curriculum'){
            $curriculum = Curriculum::findOrFail($this->modelId);
            $curriculum->notes()->attach($note);
        }

        $this->note = '';
        flash()->addSuccess("Note added successfully!");

        $this->emitEvent();
    }
}
