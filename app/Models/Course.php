<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'end_date',
        'user_id'
    ];

    public function curriculums(){
        return $this->hasMany(Curriculum::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'user_id');
    }
}
