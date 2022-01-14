<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function studentOverview(){
        return view('student-overview');
    }
}
