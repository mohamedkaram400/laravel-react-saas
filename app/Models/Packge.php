<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packge extends Model
{
    protected $fillable = [
        'name',
        'price',
        'credits'
    ];
}
