<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
       
            'product_name' => 'required',
            'product_price' => 'required',
            'seller_name'=>'required',
            'total_order' => 'required'
         
        
        ];
    }
}
