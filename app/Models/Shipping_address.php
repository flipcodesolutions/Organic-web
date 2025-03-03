<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
    public function landmark()
    {
        return $this->belongsTo(LandmarkMaster::class);
    }
}
