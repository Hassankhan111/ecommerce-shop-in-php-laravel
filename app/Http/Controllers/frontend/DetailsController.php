<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class DetailsController
{
     public function index(){
        return view('product-details');
     }
}
