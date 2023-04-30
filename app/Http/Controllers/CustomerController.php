<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Customer::all();
        
        return view('customer/index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer/create');
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
		    'postal_code' => 'required',
		    'state' => 'required',
        ]);

        $show = Customer::create($validatedData);

        return redirect('/customer')->with('success', 'Customer is successfully saved');
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
        $Product = Customer::findOrFail($id);

        return view('customer/edit', compact('Product'));
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
        $Product = Customer::find($id);
        $Product->address = $request->get('address');
        $Product->city = $request->get('city');
        $Product->postal_code = $request->get('postal_code');
        $Product->state = $request->get('state');
        $Product->save();

        return redirect('/customer')->with('success', 'Customer type is successfully updated');
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
            $Product = Customer::findOrFail($id);
            $Product->delete();
    
            return redirect('/customer')->with('success', 'Customer is successfully deleted');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['delete' => 'Sorry, we could not delete this customer record at this time because it containes foreign key.']);
        }
       
    }
}
