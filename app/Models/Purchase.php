<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Purchase extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'product_id',
        'date',
        'price',
        'qty',
    ];

    // public function productData()
    // {
    //     return $this->belongsTo(Product::class,'product_id');
    // }
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
