<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{


    protected $fillable = [
        'customer_name', 'account_id', 'email','poc_id'
    ];
    

    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable');
    // }

    // public function poc()
    // {

    //     return $this->hasManyThrough('App\Partner','App\Customer','account_id','customer_id');
    // }
   
}
