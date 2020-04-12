<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Casts\Datetime as DateCast;

class Fat extends Model
{
    use DateCast;

    protected $fillable = ['name', 'type'];
    protected $with = ['type'];

    public function type()
    {
        return $this->belongsTo('FatType');
    }

    public function cookable()
    {
        return $this->morphMany('App\Ingredient', 'cookable');
    }
}
