<?php

namespace App\Http\Controllers;

use App\Models\Individual;
use Illuminate\Http\Request;

class IndividualController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $Products = Individual::all();
            
            return view('individual/index',compact('Products'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('individual/create');
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
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'birth_date' => 'required',
                ]);
        
                $show = Individual::create($validatedData);
        
                return redirect('/individual')->with('success', 'Individual is successfully saved');
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
            $Product = Individual::findOrFail($id);
    
            return view('individual/edit', compact('Product'));
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
            $Product = Individual::find($id);
            $Product->first_name = $request->get('first_name');
            $Product->last_name = $request->get('last_name');
            $Product->birth_date = $request->get('birth_date');
            $Product->cust_id = $request->get('cust_id');
            $Product->save();
    
            return redirect('/individual')->with('success', 'Individual is successfully updated');
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
                $Product = Individual::findOrFail($id);
                $Product->delete();
        
                return redirect('/individual')->with('success', 'Individual is successfully deleted');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['delete' => 'Sorry, we could not delete this at this time. Try again later.']);
            }
           
        }
}
