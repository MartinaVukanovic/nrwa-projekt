<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $Products = Officer::all();
            
            return view('officer/index',compact('Products'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('officer/create');
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
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'start_date' => 'required',
                    'title' => 'required',
                    'end_date' => [
                        'after_or_equal:start_date',
                    ],
                ]);
        
                $show = Officer::create($validatedData);
        
                return redirect('/officer')->with('success', 'Officer is successfully saved');
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
            $Product = Officer::findOrFail($id);
    
            return view('officer/edit', compact('Product'));
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
            $Product = Officer::find($id);
            $Product->first_name = $request->get('first_name');
            $Product->last_name = $request->get('last_name');
            $Product->start_date = $request->get('start_date');
            $Product->end_date = $request->get('end_date');
            $Product->title = $request->get('title');
            $Product->cust_id = $request->get('cust_id');
            $Product->save();
    
            return redirect('/officer')->with('success', 'Officer is successfully updated');
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
                $Product = Officer::findOrFail($id);
                $Product->delete();
        
                return redirect('/officer')->with('success', 'Officer is successfully deleted');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['delete' => 'Sorry, we could not delete this at this time. Try again later.']);
            }
           
        }
}
