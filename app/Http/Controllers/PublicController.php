<?php

namespace App\Http\Controllers;

use App\Models\Activity;
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
<<<<<<< HEAD

=======
    
>>>>>>> 8fbfa6a4d71bd87b0489390a566a64a5233e902e
    public function uploadActivity(Activity $activity, Request $request) {
        $request->validate([
            'lname' => 'string|required',
            'fname' => 'string|required',
            'file' => 'file|required'
        ]);
<<<<<<< HEAD

        $file = $request->file("file");

        $path = public_path() . "/activity_files/$activity->id/";
        $filename = $request->lname . '_' . $request->fname . '.' . $file->getClientOriginalExtension();

        $file->move($path, $filename);

        return redirect('/public/modules/' . $activity->module_id)->with('Info','Your submission has been uploaded.');
=======
        
        $file = $request->file("file");
        
        $path = public_path() . '/activity_files/$activity->id/';
        $filename = $request->lname . '_' . $request->fname . $file->get6
>>>>>>> 8fbfa6a4d71bd87b0489390a566a64a5233e902e
    }
}
