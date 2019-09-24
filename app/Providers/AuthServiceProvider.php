<?php

namespace App\Providers;

use App\User;
use App\Product;
use App\Booking;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

         Gate::define('product.create', 'App\Policies\ProductPolicy@create');
         Gate::define('product.index', 'App\Policies\ProductPolicy@index');
         Gate::define('product.show', 'App\Policies\ProductPolicy@show');
         Gate::define('product.update', 'App\Policies\ProductPolicy@update');
         Gate::define('product.delete', 'App\Policies\ProductPolicy@delete');
         Gate::define('product.search', 'App\Policies\ProductPolicy@search');

       
         
    
        Gate::define('booking.create', 'App\Policies\BookingPolicy@create');
        Gate::define('booking.index', 'App\Policies\BookingPolicy@index');
        Gate::define('booking.cart', 'App\Policies\BookingPolicy@cart');
        Gate::define('booking.payment', 'App\Policies\BookingPolicy@payment');
    
        //
    }
}
