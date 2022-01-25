<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Module;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function store(Request $request, Module $module) {
        $request->validate([
            'title'=>'string|required',
            'description'=>'string'
        ]);

        Activity::create([
            'module_id' => $module->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/modules/' . $module->id)->with('Info','A new activity has been created.');
    }


}
