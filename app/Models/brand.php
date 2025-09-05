<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
  
    protected $table = 'brands';
     protected $primaryKey = 'brand_id';
      public $timestamps = true; // if you have created_at & updated_at
}
