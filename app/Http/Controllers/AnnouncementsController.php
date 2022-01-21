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

    public function announcementForm(){
        return view('Announcements/announcementsCreate');
    }

    public function createAnnouncement(Request $request){
        $request->validate([
            'title' => 'required',
            'role' => 'required',
            'description' => 'required',
        ]);

        $announcement = new Announcements;
        $announcement->title = $request->title;
        $announcement->role = $request->role;
        $announcement->description = $request->description;
        // dd($request);
        $announcement->save();

        return response()->json(['success'=>'Successfully']);
    }

    public function announcementEditForm(Announcements $announcement){
        return view('Announcements/announcementsEdit', compact('announcement'));
    }

    public function updateAnnouncement(Request $request, $id){
        $announcement = Announcements::find($id);
        $request->validate([
            'title' => 'required',
            'role' => 'required',
            'description' => 'required',
        ]);
        dd($request);
        $announcement->update([
            'title' => $request->title,
            'role' => $request->role,
            'description' => $request->description
        ]);
        return response()->json(['success'=>'Successfully']);
    }

    public function deleteAnnouncement(Request $request){
        $id = $request->id;
        $announcement = Announcement::WhereID($id)->first();
    }
}