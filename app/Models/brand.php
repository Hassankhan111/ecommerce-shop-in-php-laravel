<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
  
    protected $table = 'brands';
     protected $primaryKey = 'brand_id';
      public $timestamps = true; 

      protected $fillable = [
        'brand_name',
        'cat_name'
      ];

      public function category()
      {
        return $this->belongsTo(Category::class, 'cat_name', 'cat_id');
      }


       public function product()
      {
        return $this->hasMany(Product::class, 'product_brand', 'brand_id');
      }

   
}
