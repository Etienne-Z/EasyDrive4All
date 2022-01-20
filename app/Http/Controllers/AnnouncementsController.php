<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use Illuminate\Support\Str;

class AnnouncementsController extends Controller
{
    public function studentIndex()
    {
        $announcements = Announcements::all()->where('role', 0);
        return view('Announcements/announcements', compact('announcements'));
    }

    public function instructorIndex()
    {
        $announcements = Announcements::all()->where('role', 1);
        return view('Announcements/announcements', compact('announcements'));
    }

    public function ownerIndex()
    {
        $announcements = Announcements::all();
        return view('Announcements/adminAnnouncements', compact('announcements'));
    }

}