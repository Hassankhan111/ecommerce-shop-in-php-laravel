<?php

namespace App\Http\Controllers\backend;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class orderController
{
    public function index()
    {
      
        $orders = Order::with(['user','product'])->get();


        return view('backend.orders.order', compact('orders',));
    }

    
    
    public function update(Request $request, string $id)
    {
        $orderid = Order::findOrFail($id);

          $orderid->delivery = $request->delivery; 

           $orderid->save();
           return response()->json( $orderid);
    }
}
