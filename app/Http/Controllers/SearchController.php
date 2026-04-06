<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'data' => 'required|string|max:255'
        ]);
        $products_id = Product::select('products.id as id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->where('products.name', 'LIKE', '%' . $request->data . '%')
                ->orWhere('products.description', 'LIKE', '%' . $request->data  . '%')
                ->orWhere('categories.name', 'LIKE', '%' . $request->data . '%')
                ->get();
        $products = Product::whereIn('id', $products_id)->get();
        return view('search', compact('products'));
    }
}
