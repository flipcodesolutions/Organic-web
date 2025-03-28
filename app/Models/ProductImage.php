<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
        protected $fillable =[

            'productId',
            'url',
            'type'
        ];
    public function products()
    {
        return $this->belongsTo(Product::class,'productId');
    }

}
