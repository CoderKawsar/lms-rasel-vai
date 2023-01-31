<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('course.index');
    }

    public function create(){
        return view('course.create');
    }

    public function show($id){
        $course = Course::where('id', $id)->with('curriculums')->first();
        return view('course.show', [
            'course' => $course
        ]);
    }

    public function edit($id){
        $course = Course::findOrFail($id);
        return view('course.edit', [
            'course' => $course
        ]);
    }
}
