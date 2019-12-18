<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['name', 'restaurant_id', 'category_id', 'price'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function menu_meals()
    {
        return $this->hasMany('App\MenuMeal');
    }
}

