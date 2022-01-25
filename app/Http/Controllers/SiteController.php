<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function loginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'user_name'=>'string|required',
            'password'=>'string|required',
        ]);

        $login = auth()->attempt([
            'user_name'=>$request->user_name,
            'password'=>$request->password
        ]);

        if($login) {
            return redirect('/dashboard')->with('Info','Welcome back ' . $request->user_name . "!");
        }

        return back()->with('Error','Invalid user credentials!');
    }

    public function logout() {
        auth()->logout();
        return redirect('/login')->with('Info','You have been logged out!');
    }

    public function registrationForm() {
        return view('registration');
    }

    public function register(Request $request) {
        $request->validate([
            'user_name'=>'string|required',
            'full_name'=>'string|required',
            'password'=>'string|required|confirmed',
        ]);

        User::create([
            'user_name' => $request->user_name,
            'full_name' => $request->full_name,
            'password' => bcrypt($request->password),
        ]);

        return back()->with('Info',"The user account of $request->full_name has been created.");
    }

    public function search(Request $request) {
        $request->validate(['search_key'=>'string|required']);

        $subjects = Subject::where('course_no', 'like', "%$request->search_key%")
                ->orWhere('description','like',"%$request->search_key%")->get();

        return view('home',['subjects'=>$subjects,'key'=>$request->search_key]);
    }
}
