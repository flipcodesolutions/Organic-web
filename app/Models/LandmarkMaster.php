<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class LandmarkMaster extends Model
{
    use HasFactory;

    protected $table = 'landmark_master';
    protected $fillable = [
        'city_id', 'landmark_en', 'landmark_hi', 'landmark_gu',
        'latitude', 'longitude'
    ];

    public function city()
    {
        return $this->belongsTo(CityMaster::class, 'city_id');
    }
}
