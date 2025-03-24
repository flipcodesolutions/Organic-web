<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaPropertyProduct extends Model
{
    protected $fillablea = [
        'productId',
        'ogTitleEng',
        'ogTitleGuj',
        'ogTitleHin',
        'ogDescriptionEng',
        'ogDescriptionGuj',
        'ogDescriptionHin',
        'ogImage',
        'ogUrl',
        'description',
        'keywords',
        'author',
        'tages'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'productId');
    }
}
