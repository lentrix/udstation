<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Subject;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function showSubject(Subject $subject) {
        return view('public.subjects.view', ['subject'=>$subject]);
    }

    public function showModule(Module $module) {
        return view('public.modules.view',['module'=>$module]);
    }
}
