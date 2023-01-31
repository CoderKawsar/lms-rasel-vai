<?php

use App\Models\Attendance;
use \Illuminate\Support\Facades\Auth;


function isPresentInClass($student_id, $curriculum_id){
    return Attendance::where('user_id', $student_id)->where('curriculum_id', $curriculum_id)->exists();
}

function permission_check($permission){
    if (!Auth::user()->hasPermissionTo($permission)){
        flash()->addWarning('You are not authorized to visit this page');
        return redirect()->back()->send();
    }
}
