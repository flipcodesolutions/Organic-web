<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crm_Master extends Model
{
    protected $table = 'crm_masters';


    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];
}
