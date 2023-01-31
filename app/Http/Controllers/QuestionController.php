<?php

namespace App\Http\Controllers;

class QuestionController extends Controller
{
    public function index(){
        return view('question.index');
    }

    public function create(){
        return view('question.create');
    }

    public function show(){
        return view('question.show');
    }

    public function edit($id){
        return view('question.edit', [
            'question_id' => $id
        ]);
    }
}
