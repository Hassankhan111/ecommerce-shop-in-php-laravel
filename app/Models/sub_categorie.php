<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sub_categorie extends Model
{
    protected $table = 'sub_categories';
    protected $primaryKey = 'sub_cat_id';

    protected $fillable = [
        'sub_cat_title',
        'cat_parent',
        'cat_product',
        'show_in_header',
        'show_in_footer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_parent','cat_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class,'product_sub_cat','sub_cat_id');
    }
}
