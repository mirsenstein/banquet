<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['name', 'price', 'restaurant_id', 'course_type_id'];
    
    public function course_type()
    {
        return $this->hasOne('App\CourseType', 'foreign_key');
    }

    public function restaurant()
    {
        return $this->hasOne('App\Restaurant', 'foreign_key');
    }
}
