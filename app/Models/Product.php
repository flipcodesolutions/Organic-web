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
        return $this->hasMany(Unit::class, 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
    
}
