<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'address'];

    public function meals()
    {
        return $this->hasMany('App\Meal');
    }
    public function drinks()
    {
        return $this->hasMany('App\Drink');
    }
    public function menus()
    {
    	return $this->hasMany('App\Menu');
    }
}
