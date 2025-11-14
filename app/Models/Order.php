<?php

namespace App\Models;
use App\Models\User;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $table = 'Orders';
    public $primaryKey = 'order_id';

    protected $fillable = [
        'order_id',
        'products',
        'product_user',
        'product_qty',
        'pay_req_id',
        'confirm',
        'status',
        'total_amount'
    ];
  

   public function product(){

        return $this->belongsTo(Product::class, 'products', 'product_id');
   }

    public function user()
    {
        return $this->belongsTo(User::class, 'product_user', 'userId');
    }

}
