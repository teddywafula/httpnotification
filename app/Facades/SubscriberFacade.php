<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
use App\Contracts\SubscriberInterface;
class SubscriberFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
       return SubscriberInterface::class;
    }
}
