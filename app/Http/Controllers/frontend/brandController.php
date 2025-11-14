<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\sub_categorie;
use App\Models\brand;
use Illuminate\Http\Request;

class brandController
{
    public function brand_show(string $id){
       
        $br = brand::all();   
        $brand = brand::with(['product'])->findOrFail($id);
        

         return view('brand',compact('brand','br'));


         
    }


}