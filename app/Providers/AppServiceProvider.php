<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * Carbon Setup
         */
        app( Carbon::class )->setLocale( config('app.locale') );

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
