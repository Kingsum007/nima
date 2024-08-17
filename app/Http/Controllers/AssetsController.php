<?php

namespace App\Http\Controllers;

use App\Models\assets;
use App\Http\Requests\StoreassetsRequest;
use App\Http\Requests\UpdateassetsRequest;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = assets::all();
        return view('assets.index')->with('asset', $asset);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asset = new assets();
        $asset->title = $request->input('title');
        $asset->category = $request->input('category');
        $asset->location = $request->input('Location');
        $asset->details = $request->input('details');
        $asset->save();
        return redirect()->back()->with('success','Asset Information Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(assets $assets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(assets $assets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateassetsRequest $request,$id)
    {
        $asset =  assets::find($id);
        $asset->title = $request->input('title');
        $asset->category = $request->input('category');
        $asset->location = $request->input('Location');
        $asset->details = $request->input('details');
        $asset->update();
        return redirect()->back()->with('success','Asset Information Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asset = assets::find($id);
        $asset->delete();
        return redirect()->back();
    }
    public function test()
{
    dd("Hello");
}}
