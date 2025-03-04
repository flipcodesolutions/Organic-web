<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderMasterId');
    }
}
