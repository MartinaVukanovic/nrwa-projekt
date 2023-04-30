<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Business::all();
        
        return view('business/index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        try {
            $validatedData = $request->validate([
                'cust_id' => 'required',
                'name' => 'required',
                'state_id' => 'required',
                'incorp_date' => 'required',
            ]);
    
            $show = Business::create($validatedData);
    
            return redirect('/business')->with('success', 'Business is successfully saved');
        }  catch (\Exception $e) {
            return redirect()->back()->withErrors(['delete' => 'Sorry, we could not create this at this time. Try again later.']);
        }
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
        $Product = Business::findOrFail($id);

        return view('business/edit', compact('Product'));
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
        $validatedData = $request->validate([
        ]);
        $Product = Business::find($id);
        $Product->name = $request->get('name');
        $Product->state_id = $request->get('state_id');
        $Product->incorp_date = $request->get('incorp_date');
        $Product->cust_id = $request->get('cust_id');
        $Product->save();

        return redirect('/business')->with('success', 'Business is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Product = Business::findOrFail($id);
            $Product->delete();
    
            return redirect('/business')->with('success', 'Business is successfully deleted');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['delete' => 'Sorry, we could not delete this at this time. Try again later.']);
        }
       
    }
}
