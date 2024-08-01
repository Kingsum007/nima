<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semester = DB::table('semesters')->join('departments', 'departments.id', '=', 'semesters.dept_id')->select('semesters.*', 'departments.dept_title')->orderBy('semesters.id', 'desc')->get();

        return view('Semester.index')->with('semeseter', $semester);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = Department::all();

        return view('Semester.register')->with('dept', $dept);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sem = new Semester();
        $sem->sem_title = $request->input('sem_title');
        $sem->dept_id = $request->input('dept_id');
        $sem->sem_time = $request->input('sem_time');
        $sem->save();
        return redirect()->back()->with('success', 'Semseter Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        //
    }
}
