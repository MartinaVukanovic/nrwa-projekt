<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Department::all();
        
        return view('department/index',compact('Products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department/create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
		    'name' => 'required',
        ]);
        $show = Department::create($validatedData);
   
        return redirect('/department')->with('success', 'Department is successfully saved');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Product = Department::findOrFail($id);

        return view('department/edit', compact('Product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dept_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dept_id)
    {
        $validatedData = $request->validate([
            'name' => 'max:50'
        ]);
        $Product = Department::find($dept_id);
        $Product->name = $request->get('name');
        $Product->save();

        return redirect('/department')->with('success', 'Department is successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_type_cd
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_type_cd)
    {
        $Product = Department::findOrFail($product_type_cd);
        $Product->delete();

        return redirect('/department')->with('success', 'Department is successfully deleted');
    }

}
