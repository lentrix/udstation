<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('subjects.create');
    }

    public function store(Request $request) {
        $request->validate([
            'course_no' => 'string|required',
            'description' => 'string|required',
        ]);

        Subject::create([
            'course_no' => $request->course_no,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/dashboard')->with('Info',"$request->course_no has been created.");
    }

    public function show(Subject $subject) {
        return  view('subjects.view',['subject'=>$subject]);
    }
}
