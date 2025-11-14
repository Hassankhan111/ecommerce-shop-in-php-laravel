<?php

namespace App\Http\Controllers\Frontend;

use App\Models\brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class productssController
{
    public function index()
    {
        
       
        $product = Product::with(['Category','brand'])->get();
        return view("home", [
            'products' => $product,
        ]);
    }

}
