<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(){
        $products = Product::inRandomOrder()->take(4)->get();
        return view('index', compact('products'));
    }
}
