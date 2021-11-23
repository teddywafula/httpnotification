<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\PublishMessageRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Events\PublisherEvent;
use Illuminate\Http\Client\Pool;
class PublishMessageController extends Controller
{
    //

    public function publishMessage(PublishMessageRequest $request,string $topic)
    {
      $validated = $request->validated();
      $info = $request->all();

      if(sizeof($info)<1){
        return response()->json(['message'=>"Either the body content to post is empty or malformed."],400);
      }
      return response()->json(\PublisherFacade::publishToSubscriber($topic,$info),200);

    }
}
