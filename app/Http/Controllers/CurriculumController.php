<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;

class CurriculumController extends Controller
{
    public function show($id){
        $curriculum = Curriculum::findOrFail($id);
        return view('curriculum.show', [
            'curriculum' => $curriculum
        ]);
    }

    public function edit($id){
        $curriculum = Curriculum::findOrFail($id);
        return view('curriculum.edit', [
            'curriculum' => $curriculum
        ]);
    }


}
