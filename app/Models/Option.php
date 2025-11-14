<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';

    protected $primaryKey = 's_id';

    protected $fillable = [
        'site_name',
        'site_title',
        'site_logo',
        'site_desc',
        'footer_text',
        'currency_format',
        'contect_phone',
        'contect_email',
        'contect_address',
    ];



}
