<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CustLibs\BoardGameGeek\BoardGameGeek;

class BoardGameGeekProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("BoardGameGeek", function ($app) {
            return new BoardGameGeek();
        });
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
