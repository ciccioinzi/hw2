<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function collection()
    {
        return $this->belongsTo('App\Models\Collection');
    }
}