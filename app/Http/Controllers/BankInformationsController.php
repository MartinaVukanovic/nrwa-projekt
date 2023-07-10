<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Officer;
use App\Models\ProductType;

class BankInformationsController extends Controller
{
    public function index()
    {
        return view('bankInformations/index');
    }

    public function apiIndex()
    {
        $branches = Branch::all();
        $products = Product::All();
        $officer = Officer::All();
        $productTypes = ProductType::All();


        $data = [
            'branches' => $branches,
            'products' => $products,
            'officers' => $officer,
            'productTypes' => $productTypes,
        ];
        
        return Response::json([$data]);
    }
}
