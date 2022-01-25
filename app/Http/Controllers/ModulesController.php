<?php

namespace App\Http\Controllers;

use App\Models\Folder;
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

        if(!file_exists($path)) {
            mkdir($path);
        }

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

        $module->pack();

        return back()->with('Info','File uploaded');
    }

    public function deleteFile(Module $module, $file) {
        $fullPath = public_path() . "/module_files/" . $module->id . "/" . $file;
        if(file_exists($fullPath)) {
            unlink($fullPath);
        }

        $module->pack();

        return back()->with('Info',"$file has been deleted.");
    }

    public function edit(Module $module) {
        return view('modules.edit',['module'=>$module]);
    }

    public function update(Module $module, Request $request) {
        $request->validate([
            'title' => 'string|required',
            'date_from' => 'date|required',
            'date_to' => 'date|required'
        ]);

        $module->update($request->all());

        return redirect('/modules/' . $module->id)->with('Info','This module has been updated.');
    }

    public function delete(Module $module) {

        $title = $module->title;
        $subjectId = $module->subject_id;

        $path = public_path() . "/module_files/$module->id/";
        Folder::delete_directory($path);

        $module->delete();

        return redirect('/subjects/' . $subjectId)->with('Info',"The module entitiled $title has been deleted");
    }
}
