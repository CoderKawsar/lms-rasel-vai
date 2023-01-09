<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';
    use HasFactory;

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function homeworks(){
        return $this->hasMany(Homework::class);
    }

    public function attendences(){
        return $this->hasMany(Attendence::class);
    }
}
