<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigateMaster extends Model
{
    public function sliders()
    {
        return $this->hasMany(Slider::class, 'navigatemaster_id');
    }
}
