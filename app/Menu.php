<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['user_id', 'people', 'budget', 'restaurant_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
    public function menu_meals()
    {
        return $this->hasMany('App\MenuMeal');
    }
}
