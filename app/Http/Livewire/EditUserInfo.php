<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUserInfo extends Component
{
    public $user;
    public $type;
    public $model;

    public function mount(){
        $property = $this->type;
        $this->model = $this->user->$property;
    }

    public function render()
    {
        return view('livewire.edit-user-info');
    }

    public function changeUserInfo(){
        $property = $this->type;
        $this->user->update([
            $property => $this->model
        ]);

        flash()->addSuccess('Student info updated successfully!');
    }
}
