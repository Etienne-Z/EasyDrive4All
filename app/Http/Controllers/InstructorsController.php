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

    public function instructorRegister(){
        return view('admin.instructor-register');
    }

    public function deleteUser(Request $request)
    {
        $id = $request->id;
        $user = User::WhereID($id)->first();
        if($user->role == 0){
            instructor_has_users::User($id)->delete();
            $lessen = lessons::WhereStudent($id)->get();
            foreach($lessen as $les){
                $les->delete();
            }
        }
        
        User::WhereId($id)->delete();
        return redirect()->back();
    }



    
    public function register(Request $request){
        $request->validate([
            'first_name' => 'required',
            'insertion',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'instructor' => 'required_if:roll,==,0',
        ]);
        $password = $this->password_maker();
        $user = $this->createUser($request, $password);
        $id = $user->id;

        if($request->roll == 0){
            $instructor  = $request->instructor;
            $this->userHasInstructor($id,$instructor);
        }else{
            $this->createInstructor($id);
        }
        
        Mail::to($request->email)->send(new RegisterMail($request,$password));
        return response()->json(['success'=>'Successfully']);
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

    public function createUser($request, $password){
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

        return $user;
    }

    public function createInstructor($id){
        $instructor = new instructors();
        $instructor->User_ID = $id;
        $instructor->save();
    }





}
