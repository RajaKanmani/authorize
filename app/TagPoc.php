<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagPoc extends Model
{
    
     public function partner()
     {
        return $this->belongsToMany('App\Tag_Pocs','partner_id');
     }

     public function customers()
     {
        
        return $this->morphMany('App\Poclist');

     }

}
