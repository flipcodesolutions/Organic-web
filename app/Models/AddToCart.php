<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    public function products()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function units()
    {
        return $this->belongsTo(Unit::class,'unit');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
