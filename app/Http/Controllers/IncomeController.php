<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Http\Requests\UpdateIncomeRequest;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inc = new Income();
        $income = $inc->orderBy('created_at', 'desc')->get();
        return view('Income.index')->with('income', $income);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('income.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $income = new Income();
        $income->title = $request->input('title');
        $income->payer = $request->input('payer');
        $income->category = $request->input('category');
        $income->reviewer1 = $request->input('reviewer1');
        $income->reviewer2 = $request->input('reviewer2');
        $income->reviewer3 = $request->input('reviewer3');
        $income->amount = $request->input('amount');
        $income->details = $request->input('details');
        $imageName = '';
        if ($image = $request->file('paper_image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/incomes', $imageName);
        }
        $income->paper_image = $imageName;
        $income->save();
        return redirect()->back()->with('success', 'Information Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inc = Income::find($id);
        return view('Income.show')->with('inc',$inc);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inc = Income::find($id);
        unlink('images/incomes/'.$inc->paper_image);
        $inc->delete();
        return redirect()->back()->with('success','Income Information Deleted Successfully');
    
    }
}
