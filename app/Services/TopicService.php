<?php

namespace App\Services;
use App\Contracts\TopicInterface;
use App\Models\Topic;
use App\Models\Subscriber;
class TopicService implements TopicInterface
{

    public function createTopic($data)
    {
        // TODO: Implement createTopic() method.
        return Topic::create($data);
    }

    public function saveTopicSubscribers($topicObject, $subscriberUrl)
    {
        // TODO: Implement saveTopicSubscribers() method.
        if(!empty($subscriberUrl)) {
            $subscriber = new Subscriber(['url' => $subscriberUrl]);
            $info =  $topicObject->subscribers()->save($subscriber);
            $topicObject['url'] = $subscriberUrl;
            return $topicObject;
        }
        return null;

    }

    public function getTopicByName($topic)
    {
        // TODO: Implement getTopicByName() method.
        return Topic::where('topic','=',$topic)->first();
    }


    public function processWhenTopicDoesNotExist($topic,$subscriberUrl)
    {
        // TODO: Implement processWhenTopicDoesNotExist() method.
        $topicResults =  $this->createTopic(['topic' => $topic]);
        $saveTopicSubscriber = $this->saveTopicSubscribers($topicResults, $subscriberUrl);
        if(null != $saveTopicSubscriber){
            return $saveTopicSubscriber;
        }
        return $topicResults;
    }

    public function processWhenTopicExists($topicData,$topicId, $topic, $subscriberUrl)
    {
        // TODO: Implement processWhenTopicExists() method.
        if(!empty($subscriberUrl)){
            $subscriberForTopicExists = \SubscriberFacade::subscriberForTopicExists($subscriberUrl,$topicId);
            $topicData['url'] = $subscriberUrl;
            if(empty($subscriberForTopicExists)) {
                $this->saveTopicSubscribers($topicData, $subscriberUrl);
                return $topicData;
            }
            return $topicData;
        }
        return $topicData;
    }

    public function saveTopicAndSubscriber($topic, $subscriberUrl)
    {
        // TODO: Implement saveTopicAndSubscriber() method.
        $topicData = $this->getTopicByName($topic);
        if(!empty($topicData)) {
            return $this->processWhenTopicExists($topicData,$topicData->id, $topic, $subscriberUrl);
        }
        return $this->processWhenTopicDoesNotExist($topic,$subscriberUrl);
    }
}
