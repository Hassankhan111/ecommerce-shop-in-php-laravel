<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\sub_categorie;
use App\Models\Product;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_title',
    ];
    public function brand()
    {
        return $this->hasMany(brand::class, 'cat_name', 'cat_id');
    }

     public function subcategory()
    {
        return $this->hasMany(sub_categorie::class, 'cat_parent', 'cat_id');
    }

     public function product()
    {
        return $this->hasMany(Product::class, 'product_cat', 'cat_id');
    }

    
}
