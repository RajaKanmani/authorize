<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'partner_name', 'partner_id', 'email','customer_id'
    ];


    // public function customers()
    // {
       
    //    return $this->morphMany('App\Customer', 'tag_poc_id');

    // }

    // public function poc()
    // {

    //     return $this->hasManyThrough('App\Partner','App\Customer','account_id','customer_id');
    // }


}
