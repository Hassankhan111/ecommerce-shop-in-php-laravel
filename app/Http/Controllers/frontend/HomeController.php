<?php

namespace App\Http\Controllers\Frontend;

use App\Models\brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        
        $user = User::all();
        $category = Category::with(['product','subcategory'])->get();
        $brand = brand::all();
        $seeting_option = Option::all();
        $product = Product::all();
        return view("home", [
            'category' => $category,
            'brand' => $brand,
            'user' => $user,
            'products' => $product,
            'seeting_option' => $seeting_option,
        ]);
    }

}
