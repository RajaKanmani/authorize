<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'product_name', 'product_price','seller_name','total_order',
   ];


}
