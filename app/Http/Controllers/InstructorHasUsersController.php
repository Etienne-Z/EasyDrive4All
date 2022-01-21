<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\instructor_has_users;
use App\Models\User;

    /**
     * This class manages all the students that are linked to the logged in user page
     *
     * @copyright  2022 Examen groep 12
     */

class InstructorHasUsersController extends Controller
{

        /**
         * Returns the overview for all the students linked to the instructor
         *
         * @return View     The required view
         */
    public function index(){
        if(Auth::user()->instructor){
            $students = instructor_has_users::WhereInstructor()->name()->get();
            return view('students', compact('students'));
        }
    }


}
