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

    // relation for brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }

    // relation for metaproperty
    public function metaproperty()
    {
        return $this->hasOne(MetaPropertyProduct::class, 'productId');
    }

    // relation for reviews
    public function reviews()
    {
        return $this->hasMany(Review::class,'product_id');
    }

    public function vendor()
{
    return $this->belongsTo(User::class, 'vendor_id');
}

public function class()
{
    return $this->hasMany(Review::class);
}

public function products()
{
    return $this->hasMany(Product::class, 'vendor_id'); // Adjust foreign key if needed
}

}
