<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Casts\Datetime as DateCast;

class Ingredient extends Model
{
    use DateCast;

    protected $fillable = [
      'recipe_id',
      'weight',
      'cookable_id', 'cookable_type'];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function cookable()
    {
        return $this->morphTo();
    }
}
