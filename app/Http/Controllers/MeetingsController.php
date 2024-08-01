<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use App\Http\Requests\StoreMeetingsRequest;
use App\Http\Requests\UpdateMeetingsRequest;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meeting = Meetings::all();
        return view('meetings.index')->with('meeting', $meeting);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meetings.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meeting = new Meetings();
        $meeting->title = $request->input('title');
        $meeting->meeting_date = $request->input('meeting_date');
        $meeting->meeting_agenda = $request->input('agenda');
        $meeting->meeting_decision = $request->input('decision');
        $meeting->meeting_members = $request->input('members');
        $sign_image = '';
        if ($sign = $request->file('meeting_sign_image')) {
            $sign_image = time() . '-' . uniqid() . '.' . $sign->getClientOriginalExtension();
            $sign->move('images/meetings/sign_image', $sign_image);
        }
        $meeting->meeting_sign_image = $sign_image;
        $meeting_members_image = '';
        if ($verify = $request->file('meeting_members_image')) {
            $meeting_members_image = time() . '-' . uniqid() . '.' . $verify->getClientOriginalExtension();
            $verify->move('images/meetings/members_image', $meeting_members_image);
        }
        $meeting->meeting_members_image = $meeting_members_image;
        $meeting->save();
        return redirect()->back()->with('success', 'Meeting Record Saved Successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Meetings $meetings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meetings $meetings)
    {
        //
    }

    /**
     * Update the specified reso;urce in storage.
     */
    public function update(UpdateMeetingsRequest $request, Meetings $meetings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $meet = Meetings::find($id);
        unlink('images/meetings/memebers_image/'.$meet->meeting_members_image);
        unlink('images/meetings/sign_image/'.$meet->meeting_sign_image);
        $meet->delete();
        return back()->with('success','Deleted Successfully');  
    }
}
