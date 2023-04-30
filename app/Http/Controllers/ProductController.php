<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::all();
        
        return view('product/index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
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
            'product_cd' => 'required',
            'name' => 'required',
            'date_offered' => 'required',
            'date_retired' => [
                'required',
                'after_or_equal:date_offered',
            ],
            'product_type_cd' => 'required',
        ], [
            'date_retired.after_or_equal' => 'The date retired must be after or equal to the date offered.'
        ]);

        $show = Product::create($validatedData);
   
        return redirect('/product')->with('success', 'Product is successfully saved');

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
        $Product = Product::findOrFail($id);

        return view('product/edit', compact('Product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_cd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_cd)
    {
        $validatedData = $request->validate([
            'product_type_cd' => 'required|max:255',
            'name' => 'max:50'
        ]);
        $Product = Product::find($product_cd);
        $Product->product_type_cd = $request->get('product_cd');
        $Product->name = $request->get('name');
        $Product->date_offered = $request->get('date_offered');
        $Product->date_retired = $request->get('date_retired');
        $Product->product_type_cd  = $request->get('product_type_cd ');
        $Product->save();

        return redirect('/product')->with('success', 'Product type is successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_cd
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_cd)
    {
        $Product = Product::findOrFail($product_cd);
        $Product->delete();

        return redirect('/product')->with('success', 'Product is successfully deleted');
    }

}
