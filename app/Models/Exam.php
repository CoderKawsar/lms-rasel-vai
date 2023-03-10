<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function homeworks(){
        return $this->hasMany(Homework::class);
    }
}
