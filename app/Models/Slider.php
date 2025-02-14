<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function city(){
        return $this->belongsTo(CityMaster::class);
    }

    public function navigatemaster(){
        return $this->belongsTo(NavigateMaster::class);
    }

    // it willl be in cities and navigationmasters table
    // public function slider(){
    //     return $this->hasMany(Slider::class);
    // }
}
