<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable =[

        'unit',
        'product_id',
        'price',
        'detail',
        'per',
        'sell_price',
        'status'
    ];
    // relation for unit master
    public function unitMaster()
    {
        return $this->belongsTo(UnitMaster::class, 'unit');
    }

    // relation for product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
