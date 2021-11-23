<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
class PublisherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind("App\Contracts\PublisherInterface","App\Services\PublisherService");
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
