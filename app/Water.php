<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Casts\Datetime as DateCast;

class Water extends Model
{
    use DateCast;

    protected $fillable = ['name'];

    public function cookable()
    {
        return $this->morphMany('App\Ingredient', 'cookable');
    }
}
