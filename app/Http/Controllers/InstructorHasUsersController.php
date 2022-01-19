<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\instructor_has_users;

class InstructorHasUsersController extends Controller
{
    public function index(){
        if(Auth::user()->instructor){
            $students = instructor_has_users::WhereInstructor()->name()->get();
            return view('students', compact('students'));
        }
    }
}
