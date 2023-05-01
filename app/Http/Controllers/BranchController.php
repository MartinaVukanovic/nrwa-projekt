<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $Products = Branch::all();
            
            return view('branch/index',compact('Products'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('branch/create');
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {  
                $validatedData = $request->validate([
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'name' => 'required',
                    'zip_code' => 'required',
                ]);
        
                $show = Branch::create($validatedData);
        
                return redirect('/branch')->with('success', 'Branch is successfully saved');

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
            $Product = Branch::findOrFail($id);
    
            return view('branch/edit', compact('Product'));
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
            $Product = Branch::find($id);
            $Product->address = $request->get('address');
            $Product->city = $request->get('city');
            $Product->name = $request->get('name');
            $Product->state = $request->get('state');
            $Product->zip_code = $request->get('zip_code');
            $Product->save();
    
            return redirect('/branch')->with('success', 'Branch is successfully updated');
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
                $Product = Branch::findOrFail($id);
                $Product->delete();
        
                return redirect('/branch')->with('success', 'Branch is successfully deleted');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['delete' => 'Sorry, we could not delete this at this time. Try again later.']);
            }
           
        }
}
