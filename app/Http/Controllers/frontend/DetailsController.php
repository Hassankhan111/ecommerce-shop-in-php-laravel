<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\sub_categorie;
use Illuminate\Http\Request;

class DetailsController
{
     public function index(string $id){

       $single_product = Product::with(['Category','sub_categorie'])->findOrFail($id);

       $subcategory_product = product::with(['sub_categorie'])->get();

        return view('single-product-details',compact('single_product','subcategory_product'));
     }
}
