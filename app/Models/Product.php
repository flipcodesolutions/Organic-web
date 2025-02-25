<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // relation for category
    public function categories()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    // relation for productimaes
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'productId');
    }

    // relation for unit
    public function productUnit()
    {
        return $this->hasOne(Unit::class, 'product_id');
    }
}
