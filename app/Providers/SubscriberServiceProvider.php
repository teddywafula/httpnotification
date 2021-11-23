<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
class SubscriberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind("App\Contracts\SubscriberInterface","App\Services\SubscriberService");
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
