<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('layouts.index', compact('products'));
    }

    public function show($id)
    {
        $productKey = 'product_' . $id;

        if (!Session::has($productKey)) {
            Product::where('id', $id)->increment('view_count');
            Session::put($productKey, 1);
        }else{
            Product::where('id', $id)->increment('view_count');
        }

        $product = Product::findOrFail($id);

        // Trả về view
        return view('layouts.show', compact('product'));
    }
}
