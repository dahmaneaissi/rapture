<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Dman\Repositories\EntityRepository;
use App\Dman\Contracts\EntityRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EntityRepositoryInterface::class,
            EntityRepository::class
        );
    }
}
