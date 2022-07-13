<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function songs()
    {
        return $this->hasMany('App\Models\Song');
    }
}