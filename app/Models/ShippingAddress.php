<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public function landmark()
    {
        return $this->belongsTo(LandmarkMaster::class);
    }
}
