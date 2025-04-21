<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        
        $query = Product::with('discount');
    
        if ($request->has('on_sale') && $request->get('on_sale') == 1) {
            $query->whereHas('discount', function ($q) {
                $now = now();
                $q->where('start_date', '<=', $now)
                  ->where('end_date', '>=', $now);
            });
        }
    
        $viewData["products"] = $query->paginate(8);
        
        return view('product.index')->with("viewData", $viewData);
    }

    
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["subtitle"] =  $product->getName()." - Product information";
        $viewData["product"] = $product;
        // dd($viewData );
        return view('product.show')->with("viewData", $viewData);
    }
    
}
