<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
use App\Contracts\TopicInterface;
class TopicFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TopicInterface::class;
    }
}
