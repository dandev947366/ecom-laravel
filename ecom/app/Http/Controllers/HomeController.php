<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $cats = Category::orderBy('name', 'ASC')->get();
        $products = Product::orderBy('id', 'DESC')->limit(6)->get();
        return view('index', compact('cats','products'));
    }


    public function product(Product $product){
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('product', compact('cats','products'));
    }
}
