<?php

namespace App\Models;
use App\Models\Category;
use App\Models\sub_categorie;
use App\Models\brand;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $primaryKey = 'product_id';
    protected $fillable = [
        'product_code',
        'product_cat',
        'product_sub_cat',
        'product_brand',
        'product_title',
        'product_desc',
        'product_price',
        'product_img',
        'recent_product',
        'future_product',
        'populer_product',
        'product_qty',
        'brand_keyword',
        'product_view',
        'brand_status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'product_cat', 'cat_id');
    }

    public function sub_categorie()
    {
        return $this->belongsTo(sub_categorie::class, 'product_sub_cat', 'sub_cat_id');
    }

    public function brand()
    {
        return $this->belongsTo(brand::class, 'product_brand', 'brand_id');
    }
}
