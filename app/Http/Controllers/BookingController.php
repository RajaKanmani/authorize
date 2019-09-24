<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Booking;
use Illuminate\Http\Request;
use App\Http\Requests\BookingProductRequest;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function store(BookingProductRequest $request)
    {

       // return $request->all();
        $this->authorize('booking.create', Booking::class);

        $product_price  = $request->input('product_price');
        $total_order    = $request->input('total_order');

        $total = $total_order * $product_price;

        $booking = new Booking;
        $booking->fill($request->all());
        $booking->total_price =$total;
        $booking->booking_id =request()->user()->id;
        $booking->save();

        return new BookingResource($booking);

    }

    public function index()
    {
        $this->authorize('booking.index', Booking::class);

        $booking_id = request()->user()->id;
        $bookings = Booking::where('booking_id' ,$booking_id)->get();
    
        if(count($bookings) ==0){
            $bookings = Booking::all();
        }

        return BookingResource::collection($bookings);

    }

    public function cart(Request $request)
    {
         $user_id = request()->user()->id;
         $req['booking_id']=$user_id;
         $req['status']=1;

         $bookings_get = Booking::where($req)->first();

         $this->authorize('booking.cart',$bookings_get);

         $bookings = Booking::where($req)->get();

         return BookingResource::collection($bookings);
         
    }

    public function payment(Request $request)

    {
            $user_id = request()->user()->id;
            $req['booking_id']=$user_id;
            $req['status']=2;


            $booking_get = Booking::where($req)->first();

            $this->authorize('booking.payment',$booking_get);

            $bookings = Booking::where($req)->get();

            return BookingResource::collection($bookings);
    }



}
