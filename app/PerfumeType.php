<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfumeType extends Model
{
    public $timestamps = false;
    protected $fillable = ['type'];

    public function perfume()
    {
        return $this->hasMany('App\Perfume', 'type', 'id');
    }
}
