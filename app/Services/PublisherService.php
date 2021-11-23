<?php

namespace App\Services;

use App\Contracts\PublisherInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublisherService implements PublisherInterface
{
    public function publishToSubscriber($topic,$data)
    {
        // TODO: Implement publishToSubscriber() method.
        $subscriberEndpoints = \SubscriberFacade::getSubscribersByTopic($topic);
        $info['topic'] = $topic;
        $info['data'] = $data;
        $res = [];
        foreach ($subscriberEndpoints as $url)
        {
            $ar = $this->pushToSubscribers($url,$info);
            array_push($res,$ar);
        }
        return $res;
    }

    public function pushToSubscribers($url,$info)
    {
        try
        {
            $response = Http::post($url,$info);
            Log::info("Status for ".$url. " is ".$response->status());
            $result['status'] = $response->status();
            $result['url'] = $url;
        }
        catch (\Exception $e)
        {
            Log::error("Error for ".$url." is ".$e->getMessage().". Error code is ".$e->getCode());
            $result['status'] = $response->status();
            $result['url'] = $url;
        }
        return $result;
    }
}
