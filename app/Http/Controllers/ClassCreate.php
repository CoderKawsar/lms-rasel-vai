<?php

namespace App\Http\Controllers;

class ClassCreate extends Controller
{
    public function createClass($course_id){
        return view('curriculum.createCurriculum', [
            'course_id' => $course_id
        ]);
    }
}
