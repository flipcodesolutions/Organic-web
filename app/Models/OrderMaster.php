<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
    //
    use HasFactory;
    public function orderData(){
        return $this->hasMany(OrderDetail::class,'orderMasterId');
    }

    public function user(){
        return $this->belongsTo(User::class,'userId');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'orderMasterId');
    }

    public function shippingAddress(){
        return $this->hasOne(ShippingAddress::class,'user_id','userId');
        }
    
}


