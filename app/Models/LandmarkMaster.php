<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class LandmarkMaster extends Model
{
    use HasFactory;

    protected $table = 'landmark_masters';
    protected $fillable = [
        'city_id', 'landmark_eng', 'landmark_hin', 'landmark_guj',
        'latitude', 'longitude'
    ];

    public function citymaster()
    {
        return $this->belongsTo(CityMaster::class,'city_id');
    }
}
