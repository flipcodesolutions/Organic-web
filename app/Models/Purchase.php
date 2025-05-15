<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Purchase extends Model
{
    //
    use HasFactory;
    public function productData(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function product()
{
    return $this->belongsTo(Product::class);
}

public function vendor()
{
    return $this->belongsTo(User::class, 'vendor_id');
}

    protected $fillable = [
        'product_id',
        'date',
        'price',
        'qty',
        'status',

    ];
}
?>
