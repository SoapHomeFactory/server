<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Casts\Datetime as DateCast;

class Perfume extends Model
{
    use DateCast;

    protected $fillable = ['name', 'fragrance', 'type'];
    protected $with = ['type'];

    public function type()
    {
        return $this->belongsTo('App\PerfumeType');
    }

    public function cookable()
    {
        return $this->morphMany('App\Ingredient', 'cookable');
    }
}
