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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function prodcutImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
