<?php

namespace App\Http\Controllers;

use App\Models\assets;
use App\Models\expenses;
use App\Models\Income;
use App\Models\Meetings;
use App\Models\Staffs;
use App\Models\students;
use App\Models\Teachers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stu = students::all();
        $tea = Teachers::all();
        $inc = Income::all();
        $exp = expenses::all();
        $sta = Staffs::all();
        $meet = Meetings::all();
        $ast = assets::all();
        return view('home')->with('stu', $stu)->with('tea', $tea)->with('inc', $inc)->with('exp', $exp)->with('sta', $sta)->with('meet', $meet)->with('ast',$ast);
    }
}
