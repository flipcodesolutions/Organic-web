<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['rev_date', 'product_id', 'user_id', 'message', 'star'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        // return $this->belongsTo(User::class);

    return $this->belongsTo(User::class, 'user_id');

    }

    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class()
{
    return $this->belongsTo(Product::class);
}
}
