<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function account()
    {
          return $this->morphTo();
    }
}
