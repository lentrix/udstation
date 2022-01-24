<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Subject;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function create(Subject $subject) {
        return view('modules.create',['subject'=>$subject]);
    }

    public function store(Subject $subject, Request $request) {
        $request->validate([
            'title' => 'string|required',
            'date_from' => 'date|required',
            'date_to' => 'date|required'
        ]);

        $module = Module::create([
            'subject_id' => $subject->id,
            'title' => $request->title,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        return redirect('/modules/' . $module->id);
    }

    public function show(Module $module) {
        $files = [];

        $path = public_path() . "/module_files/$module->id/";
        $dir = opendir($path);

        while($file = readdir($dir)) {
            if(is_file($path.$file)) {
                $files[] = ['name'=>$file,'size'=>filesize($path.$file)];
            }
        }

        return view('modules.show',['module'=>$module, 'files'=>$files]);
    }

    public function upload(Request $request, Module $module) {
        $request->validate([
            'file' => 'file|required'
        ]);

        $file = $request->file('file');

        if(!file_exists(public_path() . '/module_files/' . $module->id)) {
            mkdir(public_path() . "/module_files/" . $module->id);
        }

        $destination = public_path() . "/module_files/" . $module->id;

        $file->move($destination, $file->getClientOriginalName());

        return back()->with('Info','File uploaded');
    }

    public function deleteFile(Module $module, $file) {
        $fullPath = public_path() . "/module_files/" . $module->id . "/" . $file;
        if(file_exists($fullPath)) {
            unlink($fullPath);
        }

        return back()->with('Info',"$file has been deleted.");
    }
}
