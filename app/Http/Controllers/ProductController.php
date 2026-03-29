<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(){
        $products = Product::inRandomOrder()->take(4)->get();
        return view('index', compact('products'));
    }
    public function categories(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
    public function catalog($category){
        if($category == 'new-collection'){
            $products = Product::where('is_new', true)->get();
            return view('catalog', compact('products'));
        }
        $category = Category::where('slug', $category)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('catalog', compact('products', 'category'));
    }
    public function show($product){
        $product = Product::where('slug', $product)->first();
        return view('card', compact('product'));
    }
}
