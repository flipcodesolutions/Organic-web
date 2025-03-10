<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    //
    use HasFactory;
    public function productData(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'productId');
    }
}
