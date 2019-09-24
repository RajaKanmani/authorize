<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Poc extends Model
{
   
       
    protected $fillable = [
        'name', 'poc_title', 'poc_title','description','partner_account','start_date'
    ];




    // public function hasOne()
    // {
    //     return $this->hasOne('App\Customer','account_id');
    // }
    
    public function customer_one()
    {
        return $this->hasMany('App\Customer', 'account_id');
    }

      
    public function customer_many()
    {
        return $this->hasOne('App\Customer', 'account_id');
    }

    public function pocs()
    {

        return $this->morphMany('App\PocUser', 'partner');

    }
    
     public function many()
     {
        return $this->belongsToMany(Customer::class);
     }

     public function pocs_through()
     {
         return $this->hasManyThrough('App\Partner', 'App\Customer','poc_id','customer_id');
     }
    
    

}
