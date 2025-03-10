<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'productId');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit');
    }
}
