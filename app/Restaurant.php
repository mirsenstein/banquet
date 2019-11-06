<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name'];

    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
}
