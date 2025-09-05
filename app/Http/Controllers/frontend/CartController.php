<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

class CartController
{
    public function index(){
        return view('cart');
    }
}
