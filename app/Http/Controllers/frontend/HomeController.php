<?php

namespace App\Http\Controllers\Frontend;

use App\Models\brand;
use App\Models\Futureproduct;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController
{
    public function index(){
        $category = Category::all();
        $fproduct = Futureproduct::all();
         $brand = brand::all();
        return view("home",[
            'fproduct'=>$fproduct,
            'category'=>$category,
            'brand'=>$brand]);
    }

}
