<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sickform;
use Illuminate\Support\Facades\Mail;

class SickController extends Controller
{
    public function index(){
        return view('sickform');
    }
    public function sendMail(Request $request){
        $request->validate([
            'first_name' => 'required',
            'reason' => 'required', 
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $data = array(
        'first_name' => $request->first_name,
        'reason' => $request->reason,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        
        );

        Mail::to('owner@easydrive4all.nl')->send(new sickform($data));
        return back()->with('success', 'u bent succesvol ziekgemeld.');
    }
}
