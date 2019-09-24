<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PocUser extends Model
{



    protected $fillable = [
        'partner_name'
    ];


    public function partner()
    {
        return $this->morphTo();
    }
}
