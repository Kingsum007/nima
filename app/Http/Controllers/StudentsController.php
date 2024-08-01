<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Http\Requests\StorestudentsRequest;
use App\Http\Requests\UpdatestudentsRequest;
use App\Models\Department;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
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

        if (AUTH::check()) {
            if(Auth::user()->role =='student')
            {
            $students = DB::table('students')->join('departments', 'departments.id','=', 'students.dept_id')
            ->join('semesters', 'semesters.id','=', 'students.sem_id')->select('students.*','departments.dept_title','semesters.sem_title','semesters.sem_time')->where('students.nima_id','=',Auth::user()->nima_id)->get();
            return view('students.index')->with('students', $students);
            }
            else{
                $students = DB::table('students')->join('departments', 'departments.id','=', 'students.dept_id')
            ->join('semesters', 'semesters.id','=', 'students.sem_id')->select('students.*','departments.dept_title','semesters.sem_title','semesters.sem_time')->get();
            return view('students.index')->with('students', $students);
            }
        } else {
            return redirect()->route('login');
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = Department::all();
        return view('students.register')->with('dept', $dept);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);
        $students = new students();
        $students->full_name = $request->input('name');
        $students->father_name = $request->input('father_name');
        $students->gender = $request->input('gender');
        $students->phone = $request->input('phone');
        $students->dept_id = $request->input('department');
        $students->nid_number = $request->input('NID');
        $students->nima_id = $request->input('NIMA_ID');
        $students->sem_id = $request->input('semester');
        $students->entrance_year = $request->input('entrance_year');
        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/students', $imageName);
        }
        $students->image = $imageName;
        $students->save();
        return redirect()->back()->with('success', 'Student Record Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stu = students::find($id);
        $students = DB::table('students')->join('departments', 'departments.id','=', 'students.dept_id')
        ->join('semesters', 'semesters.id','=', 'students.sem_id')->select('students.*','departments.dept_title','semesters.sem_title','semesters.sem_time')->where('students.id','=',$stu->id)->get();
        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $st = students::find($id);
        $dept = Department::all();
        return view('students.edit')->with('st',$st)->with('dept',$dept);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $students = students::find($request->id);
        $students->full_name = $request->input('name');
        $students->father_name = $request->input('father_name');
        $students->gender = $request->input('gender');
        $students->phone = $request->input('phone');
        $students->dept_id = $request->input('department');
        $students->nid_number = $request->input('NID');
        $students->nima_id = $request->input('NIMA_ID');
        $students->sem_id = $request->input('semester');
        $students->update();
        return redirect()->back()->with('success','Information Updated Successfylly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teachers = students::find($id);
        unlink('images/students/'.$teachers->image);
        $teachers->delete();
        return back()->with('success','Deleted Successfully');   
    }
    public function getData(Request $request)
    {
        return view('get');
    }
}
