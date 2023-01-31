<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class EditNote extends Component
{
    public $note;
    public $noteDesc;

    public function mount(){
        $this->noteDesc = $this->note->description;
    }

    public function render()
    {
        return view('livewire.edit-note');
    }

    public function editNote(){
        $updatedNote = Note::findOrFail($this->note->id);
        $updatedNote->update([
            'description' => $this->noteDesc
        ]);

        flash()->addSuccess('Note added successfully!');
    }
}
