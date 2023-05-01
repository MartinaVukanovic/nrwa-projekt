<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $Products = Account::all();
            
            return view('account/index',compact('Products'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('account/create');
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
                    'avail_balance' => 'required',
                    'cust_id' => 'required',
                    'open_date' => 'required',
                    'status' => 'required',
                    'pending_balance' => 'required',
                    'open_branch_id' => 'required',
                    'open_emp_id' => 'required',
                    'product_cd' => 'required',
                ]);
        
                $show = Account::create($validatedData);
        
                return redirect('/account')->with('success', 'Account is successfully saved');

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
            $Product = Account::findOrFail($id);
    
            return view('account/edit', compact('Product'));
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
            $Product = Account::find($id);
            $Product->avail_balance = $request->get('avail_balance');
            $Product->close_date = $request->get('close_date');
            $Product->last_activity_date = $request->get('last_activity_date');
            $Product->open_date = $request->get('open_date');
            $Product->pending_balance = $request->get('pending_balance');
            $Product->status = $request->get('status');
            $Product->cust_id = $request->get('cust_id');
            $Product->open_branch_id = $request->get('open_branch_id');
            $Product->open_emp_id = $request->get('open_emp_id');
            $Product->product_cd = $request->get('product_cd');

            $Product->save();
    
            return redirect('/account')->with('success', 'Account is successfully updated');
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
                $Product = Account::findOrFail($id);
                $Product->delete();
        
                return redirect('/account')->with('success', 'Account is successfully deleted');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['delete' => 'Sorry, we could not delete this at this time. Try again later.']);
            }
           
        }
}
