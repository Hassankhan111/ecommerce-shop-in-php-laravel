<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(){
        $cat = Category::all();
        return view('category',compact('cat'));
    }
}
