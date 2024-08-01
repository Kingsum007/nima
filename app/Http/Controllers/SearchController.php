<?php

namespace App\Http\Controllers;

use App\Models\assets;
use App\Models\Department;
use App\Models\expenses;
use App\Models\Income;
use App\Models\Meetings;
use App\Models\Semester;
use App\Models\Staffs;
use App\Models\students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = assets::all();
        $students = students::all();
        $teachers = Teachers::all();
        $departments = Department::all();
        $semester = Semester::all();
        $staff = Staffs::all();
        $income = Income::all();
        $expenses = expenses::all();
        return view('search.index')->with('asset', $asset)->with('students', $students)
            ->with('teachers', $teachers)->with('departments', $departments)->with('semester', $semester)
            ->with('staff', $staff)->with('income', $income)->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
    public function teReport()
    {
        $teachers = Teachers::paginate(15);
        return view('search.teReport')->with('teachers', $teachers);
    }
    public function stReport(Request $request)
    {
       
        $students = DB::table('students')->join('departments', 'departments.id', '=', 'students.dept_id')
            ->join('semesters', 'semesters.id', '=', 'students.sem_id')->where('students.dept_id', '=', $request->input('department'))->where('students.sem_id', '=', $request->input('semester'))->select('students.*', 'departments.dept_title', 'semesters.sem_title', 'semesters.sem_time')->get();
        return view('search.stReport')->with('students', $students);
    }
    public function incReport(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $inc = Income::whereBetween('created_at',[$request->startDate,$request->endDate])->get();
        return view('search.incReport')->with('inc',$inc)->with('startDate',$startDate)->with('endDate',$endDate);
    }
    public function expReport(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $inc = expenses::whereBetween('created_at',[$request->startDate,$request->endDate])->get();
        return view('search.expReport')->with('inc',$inc)->with('startDate',$startDate)->with('endDate',$endDate);
    }
    public function meetReport(Request $request)
    {
        
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    $meeting = Meetings::whereBetween('created_at',[$request->startDate,$request->endDate])->get();
        return view('search.meetReport')->with('meeting',$meeting)->with('startDate',$startDate)->with('endDate',$endDate);
    }
}
