<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sickform;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class SickController extends Controller
{
    public function index(){

        return view('instructeur/instructeur_sickform');
    }
    public function sendMail(Request $request){
    
        $request->validate([
            'reason' => 'required', 
            'start_date' => 'required',
        ]);

        $data = array(
        'first_name' => auth::user()->first_name,
        'reason' => $request->reason,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        
        );

        Mail::to('owner@easydrive4all.nl')->send(new sickform($data));
        // return back()->with('success', 'u bent succesvol ziekgemeld.');
        return response()->json(['success'=>'Successfully']);

    }
}
