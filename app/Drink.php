<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = ['name', 'restaurant_id', 'price'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
