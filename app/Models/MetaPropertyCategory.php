<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaPropertyCategory extends Model
{
    protected $fillable = [
        'categoryId',
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

    public function category()
    {
        return $this->belongsTo(Category::class,'categoryId');
    }
}
