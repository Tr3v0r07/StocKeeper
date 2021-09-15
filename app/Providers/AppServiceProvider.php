<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('admin', function () {
            return auth()->check() && Auth::user()->role =='Admin';
        });

        Blade::if('status', function($status){
            if(isset(session('order')->status)){

            return $status == session('order')->status;
                }});

    }
}
