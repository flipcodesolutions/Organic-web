<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Define the relationship to get child categories if needed
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // public function product()
    // {
    //     return $this->hasMany(Product::class, 'categoryId');
    // }

    public function products()
    {
        return $this->hasMany(Product::class, 'categoryId');
    }

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function metaproperty()
    {
        return $this->hasOne(MetaPropertyCategory::class,'categoryId');
    }
}
