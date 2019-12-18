<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuMeal extends Model
{
    protected $fillable = ['menu_id', 'meal_id'];
    
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
}
