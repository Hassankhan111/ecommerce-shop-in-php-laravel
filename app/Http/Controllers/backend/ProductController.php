<?php

namespace App\Http\Controllers\backend;

use App\Models\Futureproduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController
{
     public function index(){
        $product = Product::all();
        return $product;
        //return view('home',compact('brand'));
    }

    public function findex(){
        $fproduct = Futureproduct::all();
        return $fproduct;
        //return view('home',compact('fproduct'));
    }


}
