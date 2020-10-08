<?php

namespace Modules\Called\Entities;

use Illuminate\Database\Eloquent\Model;

class called extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'status'
    ];
}
