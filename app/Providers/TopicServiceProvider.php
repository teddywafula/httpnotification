<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class TopicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind("App\Contracts\TopicInterface","App\Services\TopicService");
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
