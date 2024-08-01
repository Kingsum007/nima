<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use App\Http\Requests\StoreexpensesRequest;
use App\Http\Requests\UpdateexpensesRequest;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exp = expenses::all();
        return view('Expenses.index')->with('exp', $exp);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Expenses.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exp = new expenses();
        $exp->title = $request->input('title');
        $exp->category = $request->input('category');
        $exp->used_by = $request->input('used_by');
        $exp->amount = $request->input('amount');
        $exp->details = $request->input('details');
        $exp->reviewer1 = $request->input('reviewer1');
        $exp->reviewer2 = $request->input('reviewer2');
        $exp->reviewer3 = $request->input('reviewer3');
        $billName = '';
        if ($bill = $request->file('bill_image')) {
            $billName = time() . '-' . uniqid() . '.' . $bill->getClientOriginalExtension();
            $bill->move('images/expenses/bills', $billName);
        }
        $exp->bill_image = $billName;
        $verify_image = '';
        if ($verify = $request->file('verify_image')) {
            $verify_image = time() . '-' . uniqid() . '.' . $verify->getClientOriginalExtension();
            $verify->move('images/expenses/verify', $verify_image);
        }
        $exp->verify_image = $verify_image;
        $exp->save();
        return redirect()->back()->with('success', 'Expense Record Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exp = expenses::find($id);
        return view('Expenses.show')->with('exp', $exp);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateexpensesRequest $request, expenses $expenses)
    {
        $exp = expenses::find($expenses);
        $exp->title = $request->input('title');
        $exp->category = $request->input('category');
        $exp->used_by = $request->input('used_by');
        $exp->amount = $request->input('amount');
        $exp->details = $request->input('details');
        $exp->reviewer1 = $request->input('reviewer1');
        $exp->reviewer2 = $request->input('reviewer2');
        $exp->reviewer3 = $request->input('reviewer3');
        $exp->update();
        return redirect()->back()->with('success','Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expenses $expenses)
    {
        //
    }
}
