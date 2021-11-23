<?php

namespace App\Contracts;

interface PublisherInterface
{
    public function publishToSubscriber($topic,$data);
}
