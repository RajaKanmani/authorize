<?php

namespace App\Policies;

use App\User;
use App\Booking;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {

        return true;

    }

    public function index(User $user)
    {
        return true;
    }
    
    public function cart(User $user, Booking $booking)
    {
         return $user->id==$booking->booking_id;
    }

    public function payment(User $user, Booking $booking)
    {
        return $user->id==$booking->booking_id;
    }


}
