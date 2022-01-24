<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Models\Cars;
use App\Models\User;
use App\Models\instructors;
use App\Models\instructor_has_users;
use App\Models\lessons;
use App\Models\Exams;

use App\Mail\RegisterMail;

    /**
     * This class manages the admin page
     *
     * This class manages functions for the CRUD actions for the admin page that contains students, instructors and cars.
     *
     * @copyright  2022 Examen groep 12
     */
    class AdminController extends Controller
    {

        /**
         * Returns the overview for cars
         *
         * @return Cars     All the cars
         * @return View     The required view
         */
        public function carsOverview(){
            $cars = Cars::get();
            return view('admin.cars-overview',compact('cars'));
        }

        /**
         * Returns the overview for students
         *
         * @return Users    All the users
         * @return View     The required view
         */

        public function studentOverview(){
            $students = User::WhereStudent()->get();
            $success_exams = Exams::ExamCompleted()->count();
            $total_exams = Exams::count();
            return view('student-overview',compact(['students','total_exams']));
        }

        /**
         * Returns the overview for instructors
         *
         * @return Instructors  All the instructors
         * @return View         The required view
         */
        public function instructorOverview(){
            $instructors = User::WhereInstructor()->get();
            return view('instructor-overview',compact('instructors'));
        }

        /**
         * Returns the registerform for students
         *
         * @return Instructors  All the instructors
         * @return View         The required view
         */
        public function studentRegister(){
            $instructors = Instructors::Name()->get();
            return view('admin.student-register',compact('instructors'));
        }

        /**
         * Returns the registerform for instructors
         *
         * @return View     The required view
         */
        public function changeStudent($id){
            $user =  User::WhereId($id)->first();
            $instructors = Instructors::Name()->get();
            if(isset(instructor_has_users::WhereUser($user->id)->first()->Instructor_ID)){
                $instructor_has_user = instructor_has_users::WhereUser($user->id)->first()->Instructor_ID;
                return view('admin.change-student',compact(['user','instructors','instructor_has_user']));
            }
            return view('admin.change-student',compact(['user','instructors']));
        }

        public function changeInstructor($id){
            $instructor = User::WhereId($id)->first();
            return view('admin.change-instructor',compact('instructor'));
        }

        public function instructorRegister(){
            return view('admin.instructor-register');
        }

        /**
         * Returns the registerform for cars
         *
         * @return View     The required view
         */
        public function carRegister(){
            return view('admin.car-register');
        }

        /**
         * Creates a new car
         *
         * @param Request   The data that is being send through with the form
         *
         * @return Json     The json response for the ajax request
         */
        public function CreateCar(Request $request){
            $request->validate([
                'Type' => 'required',
                'Brand' => 'required',
                'License_plate' => 'required'
            ]);

            $car = new Cars();
            $car->Type = $request->Type;
            $car->Brand = $request->Brand;
            $car->License_plate = $request->License_plate;
            $car->save();

            return response()->json(['success'=>'Successfully']);
        }

        /**
         * Updates the selected car
         *
         * @param Request   The data that is being send through with the form
         *
         * @return View     The last view
         */
        public function UpdateCar(Request $request){
            $request->validate([
                'id' => 'required',
                'Type' => 'required',
                'Brand' => 'required',
                'License_plate' => 'required'
            ]);
            $car = Cars::whereID($request->id)->first();
            $car->Type = $request->Type;
            $car->Brand = $request->Brand;
            $car->License_plate = $request->License_plate;
            $car->save();
            return redirect()->back();
        }

        /**
         * Deletes the selected
         *
         * @param Request   The data that is being send through with the form
         *
         * @return View     The last view
         */
        public function DeleteCar(Request $request){
            $request->validate([
                'id' => 'required',
            ]);
            Cars::WhereID($request->id)->delete();
            return redirect()->back();
        }

        /**
         * Initialises the creation of a user
         *
         * @param Request   The data that is being send through with the form
         *
         * @return Mail     Mails the account information to the registered user
         * @return Json     The json response for the ajax request
         */
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

            // If user = student, link it to an instructor else create an instructor
            if($request->roll == 0){
                $instructor  = $request->instructor;
                $this->userHasInstructor($id,$instructor);
            }else{
                $this->createInstructor($id);
            }

            Mail::to($request->email)->send(new RegisterMail($request,$password));
            return response()->json(['success'=>'Successfully']);
        }


        /**
         * Removes a user in the database
         *
         * @param Request   The data that is being send through with the form
         *
         * @return View     The last view
         */
        public function deleteUser(Request $request){
            $id = $request->id;
            $user = User::WhereID($id)->first();
            if($user->role == 0){
                instructor_has_users::User($id)->delete();
                $lessen = lessons::WhereStudent($id)->get();
                foreach($lessen as $les){
                    $les->delete();
                }
            }else{
                $instructor = instructors::Instructor($id);
                $insturctor_has_users = instructor_has_users::WhereInstructorId($instructor->first()->id)->get();
                $lessons = lessons::WhereInstructor($instructor->first()->id)->get();

                foreach($lessons as $lesson){
                    $lesson->delete();
                }
                foreach($insturctor_has_users as $insturctor_has_user){
                    $insturctor_has_user->delete();
                }
                $instructor->delete();
            }
            User::WhereId($id)->delete();
            return redirect()->back();
        }


        /**
         * Hashes the password
         *
         * @return Bytes    Returns the hashed password
         */
        public function password_maker(){
            $bytes = random_bytes(4);
            $bytes = bin2hex($bytes);
            return $bytes;
        }



        /**
         * Creates an user instance in the database
         *
         * @param Request           The information of the user
         * @param Password          The hashed password for the user
         *
         * @return User             The User instance in the database
         */
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

        /**
         * Creates an instructor instance in the database
         *
         * @param id                The user_ID in the database
         *  
         * @return void
         */
        public function createInstructor($id){
            $instructor = new instructors();
            $instructor->User_ID = $id;
            $instructor->save();
        }

        public function updateUser(Request $request){
            $user = User::WhereId($request->user_id)->first();
            $request->validate([
                'first_name' => 'required',
                'insertion',
                'last_name' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
                'address' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
            ]);
            $user->first_name = $request->first_name;
            $user->insertion = $request->insertion;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $this->updateUserInstructor($user->id,$request->instructor);
            $user->address = $request->address;
            $user->city = $request->city;
            $user->zipcode = $request->zipcode;
            $user->save();
            return response()->json(['success'=>'Successfully']);
        }

        /**
         * Update instructor of a student   
         *
         * @param user_id user id of the student
         * @param instructor_id the new id of the students instructor
         * @return void     The required view
         * 
         */

        public function updateUserInstructor($user_id, $instructor_id){
            $user = instructor_has_users::WhereUser($user_id)->first();
            if(!isset($user)){
                $this->userHasInstructor($user_id, $instructor_id);
                return;
            }else{
                $user->Instructor_ID = $instructor_id;
                $user->save();
                return;
            }
        }


        /**
         * Update information of a instructor  
         *
         * @param request sended data from the form 
         * @return json    The required view
         * 
         */
        public function updateInstructor(Request $request){
            $user = User::WhereId($request->user_id)->first();
            $request->validate([
                'first_name' => 'required',
                'insertion',
                'last_name' => 'required',
                'email' => 'required|unique:users,email,' . $user->id,
                'address' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'sick',
                'amount_sick'
            ]);
            $user->first_name = $request->first_name;
            $user->insertion = $request->insertion;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->zipcode = $request->zipcode;
            $user->sick = $request->sick;
            $user->amount_sick = $request->amount_sick;
            $user->save();
            return response()->json(['success'=>'Successfully']);
        }

        /**
         * Links a student to an instructor
         *
         * @param User_id           The ID of the student
         * @param Instructor_id     The ID of the instructor
         *
         * @return void
        */
        public function userHasInstructor($user_id, $instructor_id){
            $new = new instructor_has_users();
            $new->User_ID = $user_id;
            $new->Instructor_ID = $instructor_id;
            $new->save();
        }
    }

    

