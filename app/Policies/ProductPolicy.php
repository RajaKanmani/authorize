<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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

    public function index(User $user)
    {

        return true;
        
    }
    public function create(User $user)
    {
    
        return  $user->role =="seller";

    }

    public function show(User $user)
    {

        return $user->role =="admin";

    }

    public function update(User $user)
    {

        return $user->role =="admin";

    }

    public function delete(User $user)
    {

        return $user->role =="admin";

    }

    public function search(User $user)
    {
         return true;
    }


    


    
}
