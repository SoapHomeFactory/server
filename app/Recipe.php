<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name'];
    protected $with = ['ingredients'];

    public function ingredients()
    {
       return $this->hasMany('App\Ingredient');
    }
}
