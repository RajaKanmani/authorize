<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poclist extends Model
{
    protected $fillable = [
        'poclist_type', 'poclist_id'
    ];


    public function poclist()
    {
        return $this->morphTo();
    }
}
