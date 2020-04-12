<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FatType extends Model
{

    public $timestamps = false;
    protected $fillable = ['type'];

    public function fats()
    {
        return $this->hasMany('App\Fats', 'type', 'id');
    }
}
