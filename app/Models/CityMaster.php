<?php

namespace App\Models;

use App\Models\CityMaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CityMaster extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'city_name_eng', 'city_name_hin', 'city_name_guj', 'pincode',
        'area_eng', 'area_hin', 'area_guj'
    ];

    public function landmarks()
    {
        return $this->hasMany(LandmarkMaster::class, 'city_id');
    }
}