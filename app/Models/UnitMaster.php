<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMaster extends Model
{
    use HasFactory;


    public function unit()
    {
        return $this->hasMany(Unit::class, 'unit', 'id');
    }
}
