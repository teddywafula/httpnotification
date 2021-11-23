<?php
namespace App\Contracts;
interface TopicInterface
{
    public function createTopic($data);
    public function saveTopicSubscribers($topicObject,$url);
    public function getTopicByName($topic);
    public function processWhenTopicExists($topicData,$topicId, $topic, $subscriberUrl);
    public function processWhenTopicDoesNotExist($topic,$subscriberUrl);
    public function saveTopicAndSubscriber($topic,$subscriberUrl);
}
