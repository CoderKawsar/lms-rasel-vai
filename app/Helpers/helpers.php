<?php

use \Illuminate\Support\Facades\Auth;

function permission_check($permission){
    if (!Auth::user()->hasPermissionTo($permission)){
        flash()->addWarning('You are not authorized to visit this page');
        return redirect()->back()->send();
    }
}
