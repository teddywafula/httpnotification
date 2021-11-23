<?php

namespace App\Services;
use App\Contracts\SubscriberInterface;
use App\Models\Subscriber;
class SubscriberService implements SubscriberInterface
{

    public function subscriberForTopicExists($subscriber, $topic)
    {
        // TODO: Implement subscriberExists() method.
        return Subscriber::where('url','=',$subscriber)->where('topic_id','=',$topic)->first();
    }

    public function getSubscribersByTopic($topic)
    {
        // TODO: Implement getSubscribersByTopic() method.
        return Subscriber::whereHas('topic',function ($q) use($topic){
            $q->where('topic','=',$topic);
        })->get()->pluck('url');
    }

}
