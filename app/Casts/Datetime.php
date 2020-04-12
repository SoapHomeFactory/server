<?php

namespace App\Casts;
use Carbon\Carbon;

trait Datetime
{
    protected $format = 'Y-m-d H:i:s';

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->format($this->format);
    }

    public function getUpdatedAtAttribute($value)
    {
        return (new Carbon($value))->format($this->format);
    }
}
