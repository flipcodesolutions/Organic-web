<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // relation belongsTo
    public function categories()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'productId');
    }
}
