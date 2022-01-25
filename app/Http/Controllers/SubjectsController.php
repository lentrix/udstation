<?php

namespace App\Http\Controllers;

use App\Models\Folder;
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
            'schedule' => 'string|required',
        ]);

        Subject::create([
            'course_no' => $request->course_no,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/dashboard')->with('Info',"$request->course_no has been created.");
    }

    public function show(Subject $subject) {
        return  view('subjects.view',['subject'=>$subject]);
    }

    public function edit(Subject $subject) {
        return view('subjects.edit', ['subject'=>$subject]);
    }

    public function update(Subject $subject, Request $request) {
        $request->validate([
            'course_no' => 'string|required',
            'description' => 'string|required',
            'schedule' => 'string|required',
        ]);

        $subject->update($request->all());

        return redirect('/subjects/' . $subject->id)->with('Info','This subject has been updated.');
    }

    public function delete(Subject $subject) {
        $subjectName = $subject->course_no;
        //delete modules and files
        foreach($subject->modules as $module) {
            $path = public_path() . "/module_files/" . $module->id;
            Folder::delete_directory($path);
            $module->delete();
        }

        $subject->delete();

        return redirect('/dashboard')->with('Info',"The subject $subjectName has been deleted.");
    }
}
