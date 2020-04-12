<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Casts\Datetime as DateCast;

class Lye extends Model
{
    use DateCast;

    public $timestamps = false;
    protected $fillable = ['name', 'formula'];

    public function cookable()
    {
        return $this->morphMany('App\Ingredient', 'cookable');
    }
}
