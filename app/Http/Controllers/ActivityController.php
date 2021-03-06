<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Folder;
use App\Models\Module;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

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

        $path = public_path() . "/activity_files/$request->module_id";

        if(!file_exists($path))
            mkdir($path);

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

    public function downloadSubmissions(Activity $activity) {
        $activity->pack();
        return redirect('/activity_files/' . $activity->id . '/' . $activity->module->subject->course_no . '_' . $activity->title . '.zip');
    }
}
