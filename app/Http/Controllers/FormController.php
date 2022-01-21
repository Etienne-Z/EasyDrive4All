<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendForm;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    /**
     * This class manages sign up form
     *
     * @copyright  2022 Examen groep 12
     */

    /**
     * Returns the sign up page
     *
     * @return View     The required view
     */
    public function index()
    {
        return view('subform');
    }

        /**
         * Sends the sign up mail to the owner
         *
         * @param Request   The data that is being send through with the form
         *
         * @return Mail     Mails the information of the user towards the owner
         * @return Json     The json response for the ajax request
         */
    public function sendMail(Request $request){
        $request->validate([
            'first_name' => 'required',
            'insertion',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required'
        ]);

        $data = array(
        'first_name' => $request->first_name,
        'insertion' => $request->insertion,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'address' => $request->address,
        'city' => $request->city,
        'zipcode' => $request->zipcode,
        );

        Mail::to('owner@easydrive4all.nl')->send(new SendForm($data));
        return response()->json(['success'=>'Successfully']);
    }
}
