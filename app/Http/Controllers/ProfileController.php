<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


    /**
     * This class manages the profile page
     *
     * @copyright  2022 Examen groep 12
     */
class ProfileController extends Controller
{
        /**
         * Returns the overview for the logged in user
         *
         * @return user_info     All the info of the user
         * @return View          The required view
         */
    public function index(){
        // Logged in user
        $user = Auth::user();
        $user_info = [
            "Voornaam" => $user->first_name,
            "Tussenvoegsels" => $user->insertion,
            "Achternaam" => $user->last_name,
            "Stad" => $user->city,
            "Adres" => $user->address,
            "Postcode" => $user->zipcode,
            "email" => $user->email,
            "lessen_tegoed" => $user->lesson_hours
        ];
        return view('profile', compact('user_info'));
    }
}
