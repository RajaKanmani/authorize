<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
            return [
                'id'=>$this->id,
                'booking_id' => $this->booking_id, 
                'product_name' => $this->product_name,
                'product_price' => $this->product_price,
                'seller_name'=>$this->seller_name,
                'total_order'=>$this->total_order,
                'total_price'=>$this->total_price
        ];
    }
}
