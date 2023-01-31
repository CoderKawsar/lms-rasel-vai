<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function show($id){
        return view('curriculum.show', [
            'curriculum_id' => $id
        ]);
    }

    public function edit($id){
        $curriculum = Curriculum::findOrFail($id);
        return view('curriculum.edit', [
            'curriculum' => $curriculum
        ]);
    }
}
