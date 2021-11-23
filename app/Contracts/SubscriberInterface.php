<?php

namespace App\Contracts;

interface SubscriberInterface
{
    public function subscriberForTopicExists($subscriber,$topic);
    public function getSubscribersByTopic($topic);
}
