<?php

namespace Modules\Called\Entities;

use Illuminate\Database\Eloquent\Model;

class called extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'status',
        'solution'
    ];

    public function user()
    {
        return $this->belongsTo(\App\user::class, 'user_id');
    }
}
