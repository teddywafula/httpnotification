<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
use App\Contracts\PublisherInterface;
class PublisherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PublisherInterface::class;
    }
}
