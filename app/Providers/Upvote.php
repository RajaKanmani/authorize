<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Upvote extends Model
{
    /**
     * Get all of the owning models.
     */
    public function upvoteable()
    {
        return $this->morphTo();
    }
}