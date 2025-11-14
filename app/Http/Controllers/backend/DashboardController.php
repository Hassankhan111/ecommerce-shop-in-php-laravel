<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Models\brand;
use App\Models\Category;
use App\Models\sub_categorie;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController
{
    public function index(){
        $user = User::all();
        $product = Product::all();
        $category = Category::all();
        $sub_cat = sub_categorie::all();
        $brand = brand::all();
        $order = Order::all();
        
        return view('backend.dashboard',compact('user','product','category','sub_cat','brand','order'));
    }
}
