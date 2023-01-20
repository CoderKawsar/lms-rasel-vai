<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';
    use HasFactory;

    protected $fillable = [
        'name',
        'week_day',
        'end_date',
        'class_time',
        'course_id'
    ];

    public function notes(){
        return $this->belongsToMany(Note::class, 'curriculum_note');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function homeworks(){
        return $this->hasMany(Homework::class);
    }

    public function attendences(){
        return $this->hasMany(Attendance::class);
    }

    public function presentStudents(){
        return Attendance::where('curriculum_id', $this->id)->count();
    }
}
