<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Folder;
use App\Models\Module;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'title'=>'string|required',
            'description'=>'string'
        ]);

        Activity::create([
            'module_id' => $request->module_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        mkdir(public_path() . "/activity_files/$request->module_id");

        return redirect('/modules/' . $request->module_id)->with('Info','A new activity has been created.');
    }

    public function edit(Activity $activity) {
        return view('activities.edit',['activity'=>$activity]);
    }

    public function update(Activity $activity, Request $request) {
        $request->validate([
            'title' => 'string|required',
            'description' => 'string'
        ]);

        $activity->update($request->all());

        return redirect('/modules/' . $activity->module_id)->with('Info','An activity has been updated.');
    }

    public function delete(Activity $activity) {
        $path = public_path() . "/activity_files/" . $activity->id;
        $moduleId = $activity->module_id;

        Folder::delete_directory($path);

        $activity->delete();

        return redirect('/modules/' . $moduleId)->with('Info','An activity has been deleted.');
    }
}
