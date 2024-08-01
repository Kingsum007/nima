<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use App\Http\Requests\StoreStaffsRequest;
use App\Http\Requests\UpdateStaffsRequest;
use Illuminate\Http\Request;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staffs::all();
        return view('staffs.index')->with('staff', $staff);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staffs.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staff = new Staffs();
        $staff->full_name = $request->full_name;
        $staff->father_name = $request->father_name;
        $staff->gender = $request->gender;
        $staff->province = $request->province;
        $staff->position = $request->position;
        $staff->nid_number = $request->nid_number;
        $staff->nima_id = $request->nima_id;
        $staff->phone = $request->phone;
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/staff', $imageName);
        }
        $staff->image = $imageName;
        $staff->save();
        return redirect()->back()->with('success','Staff Information Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staffs $staffs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staffs $staffs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $staff = Staffs::find($id);
        $staff->full_name = $request->full_name;
        $staff->father_name = $request->father_name;
        $staff->gender = $request->gender;
        $staff->province = $request->province;
        $staff->position = $request->position;
        $staff->nid_number = $request->nid_number;
        $staff->nima_id = $request->nima_id;
        $staff->phone = $request->phone;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staffs $staffs)
    {
        //
    }
}
