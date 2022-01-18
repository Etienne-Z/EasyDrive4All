<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\instructor_has_users;
use App\Models\instructors;
use Illuminate\Support\Facades\Auth;
use App\Models\lessons;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class InstructorsController extends Controller
{
    public function studentOverview(){
        $students = User::WhereStudent()->get();
        return view('student-overview',compact('students'));
    }

    public function instructorOverview(){
        $instructors = User::WhereInstructor()->get();
        return view('instructor-overview',compact('instructors'));
    }

    public function studentRegister(){
        $instructors = Instructors::Name()->get();
        return view('admin.student-register',compact('instructors'));
    }

    public function deleteUser(Request $request)
    {
        $id = $request->id;
        instructor_has_users::User($id)->delete();
        $lessen = lessons::WhereStudent($id)->get();
        foreach($lessen as $les){
            $les->delete();
        }
        User::WhereId($id)->delete();
        return redirect()->back();
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required',
            'insertion',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required'
        ]);

        $password = $this->password_maker();

        $user = new User();
        $user->first_name = $request->first_name;
        $user->insertion = $request->insertion;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->zipcode = $request->zipcode;
        $user->role = $request->roll;
        $user->sick = 0;
        $user->lesson_hours = 0;
        $user->password = Hash::make($password);
        $user->save();



        dd($request->instructor);
        $id = $user->id;
        // $instructor  = intval($request->instructor);


        // $instructor_has_users = new instructor_has_users();
        // $instructor_has_users->User_ID = $id;
        // $instructor_has_users->Instructor_ID = $instructor_id;

        // $this->userHasInstructor($id,$instructor);

        // Mail::to($request->email)->send(new RegisterMail($request,$password));
        return redirect()->back();
    }

    public function password_maker(){
        $bytes = random_bytes(4);
        $bytes = bin2hex($bytes);
        return $bytes;
    }

    public function userHasInstructor($user_id, $instructor_id){
        $new = new instructor_has_users();
        $new->User_ID = $user_id;
        $new->Instructor_ID = $instructor_id;
        $new->save();
    }


}
