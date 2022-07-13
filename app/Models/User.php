<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function collections()
    {
        return $this->hasMany('App\Models\Collection');
    }
}
