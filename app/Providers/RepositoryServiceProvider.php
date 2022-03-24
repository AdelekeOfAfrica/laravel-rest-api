<?php

namespace App\Providers;

use App\Repository\Itestinterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Itestinterface',
            'App\Repositories\testinterface'
            //Itestinterface::class,testinterface::class//
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
