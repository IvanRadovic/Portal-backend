<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategories = Subcategory::orderBy('id', 'desc')->get();;

         return view('subcategories', ['title' => 'Subcategory', 'subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
                'name' => 'required',
            ]);

            SubCategory::create([
                'name' => $request->name,
            ]);

            return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $subcategory = SubCategory::find($id);
          return view('subcategories.show', ['subcategory' => $subcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
             request()->validate([
                 'name' => 'required',
             ]);

           $subcategory = SubCategory::find($id);
           $subcategory->name = $request->input('name');
           $subcategory->save();

           return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $subcategory = SubCategory::findOrFail($id);
       $subcategory->delete();

       Session::flash('success', 'Successfully deleted the subcategory!');

       return redirect()->route('subcategories.index');
    }
}
