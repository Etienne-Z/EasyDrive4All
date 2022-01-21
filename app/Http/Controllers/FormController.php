<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendForm;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('subform');
    }

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
