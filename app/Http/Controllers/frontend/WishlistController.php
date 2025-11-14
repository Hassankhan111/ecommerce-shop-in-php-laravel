<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\sub_categorie;


class WishlistController
{
    public function index(string $id){
       
       
       $single_product = Product::with(['Category','sub_categorie'])->where('product_id',$id)->get();
      $products = Product::all();
        return view('washlist',compact('single_product','products'));
     }
       /* $products = Product::all();
        return view('cart',compact('products'));*/

   // }

}
