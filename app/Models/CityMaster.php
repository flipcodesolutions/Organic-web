<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CityMaster extends Model
{
    use HasFactory;
    protected $table = 'city_masters';
    protected $fillable = [
        'city_name_eng', 'city_name_hin', 'city_name_guj', 'pincode',
        'area_eng', 'area_hin', 'area_guj'
    ];

    public function landmark()
    {
        return $this->hasMany(LandmarkMaster::class, 'city_id','id');
    }
}

    // public function sliders()
    // {
    //     return $this->hasMany(Slider::class, 'city_id');
    // }
