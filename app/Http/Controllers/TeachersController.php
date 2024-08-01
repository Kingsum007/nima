<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Http\Requests\UpdateTeachersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller
{
    public function __CONSTRUCT()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teachers::all();
        return view('teachers.index')->with('teachers', $teachers);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        $teachers = new Teachers();
        $teachers->full_name = $request->input('teacher_name');
        $teachers->father_name  =     $request->input('teacher_father_name');
        $teachers->gender = $request->input('gender');
        $teachers->nid_number = $request->input('teacher_NID_number');
        $teachers->nima_id = $request->input('teacher_NIMA_ID');
        $teachers->phone = $request->input('teacher_phone');
        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/teachers', $imageName);
        }
        $teachers->image = $imageName;
        $teachers->save();
        return redirect()->back()->with('success', 'Teacher Information Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teachers = Teachers::find($id);
        return view('teachers.edit')->with('teachers', $teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $teachers = Teachers::find($id);
        $teachers->full_name = $request->input('teacher_name');
        $teachers->father_name  =  $request->input('teacher_father_name');
        $teachers->gender = $request->input('gender');
        $teachers->nid_number = $request->input('teacher_NID_number');
        $teachers->nima_id = $request->input('teacher_NIMA_ID');
        $teachers->phone = $request->input('teacher_phone');
        $teachers->update();
        return redirect()->back()->with('success', 'Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teachers $teachers, $id)
    {
        $teachers = Teachers::find($id);
        unlink('images/teachers/' . $teachers->image);
        $teachers->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
