<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'image',
        'route_name',
        'name',
        'description',
        'required_credits',
        'active'
    ];
}
