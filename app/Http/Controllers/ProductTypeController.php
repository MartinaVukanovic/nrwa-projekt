<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = ProductType::all();
        
        return view('ProductType/index',compact('Products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProductType/create');
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
            'product_type_cd' => 'required|max:255',
		    'name' => 'required|max:50',
        ]);
        $show = ProductType::create($validatedData);
   
        return redirect('/productType')->with('success', 'Product type is successfully saved');

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
        $Product = ProductType::findOrFail($id);

        return view('ProductType/edit', compact('Product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_type_cd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_type_cd)
    {
        $validatedData = $request->validate([
            'product_type_cd' => 'required|max:255',
            'name' => 'max:50'
        ]);
        $Product = ProductType::find($product_type_cd);
        $Product->product_type_cd = $request->get('product_type_cd');
        $Product->name = $request->get('name');
        $Product->save();

        return redirect('/productType')->with('success', 'Product type is successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_type_cd
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_type_cd)
    {
        $Product = ProductType::findOrFail($product_type_cd);
        $Product->delete();

        return redirect('/productType')->with('success', 'Product type is successfully deleted');
    }

}
