<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public function landmark()
    {
        return $this->belongsTo(LandmarkMaster::class);
    }

    public function ordermaster()
    {
        return $this->hasMany(OrderMaster::class,'shipping_id');
    }
}
