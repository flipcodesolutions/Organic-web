<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackOrder extends Model
{
    public function orderdetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
