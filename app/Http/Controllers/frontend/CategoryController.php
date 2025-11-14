<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\sub_categorie;
use App\Models\brand;
use Illuminate\Http\Request;

class CategoryController
{
    public function cat_show(string $id){
       
        $cat = Category::with(['product'])->findOrFail($id);

        $related_products = product::with(['brand', 'sub_categorie'])->get();

         return view('category',compact('cat','related_products'));
    }


}
