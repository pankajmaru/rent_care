<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Admin;

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
        $image = Admin::first(); //Change this to the code you would use to get the notifications

        view()->share('image', $image);
    }
}
