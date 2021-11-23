<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumeMessageRequest;
use App\Http\Resources\SubscriberResource;
class ConsumeMessageController extends Controller
{
    public function consumeMessage(ConsumeMessageRequest $request,string $topic){
        $validated = $request->validated();
        $subscriber_url = $request->input('url');
        return new SubscriberResource(\TopicFacade::saveTopicAndSubscriber($topic,$subscriber_url));
    }
}
