<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use App\Models\Topic;
use Database\Seeders\SubscriberSeeder;
use Database\Seeders\TopicSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class PublisherTest extends TestCase
{
    use RefreshDatabase;
    /*
 * Publish messages
 * */

    public function test_create_topic_without_subscriber()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/publish/topic3',[]);

        $response->assertStatus(400);
    }

    public function test_create_topic_with_subscriber()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/publish/topic2',['msg'=>'helloworld']);

        $response->assertStatus(200);
    }
/*
    public function test_http_post_requests()
    {
//        Http::fake();
        $url = "http://localhost:9000/api/test1";
        $data = ["msg"=>"hello world"];
        $response = Http::post($url,$data);
        $status = $response->status();


        $this->seed(TopicSeeder::class);
        $this->seed(SubscriberSeeder::class);
        $subscriberData = Subscriber::first();

        if(!empty($subscriberData)) {
            $subscriberUrl = $subscriberData->url;
            $topicId = $subscriberData->topic_id;
            $topicData = Topic::find($topicId)->first();
            if (!empty($topicData)) {
                $topicName = $topicData->topic;
                $topicId = $topicData->id;

                $response = $this->withHeaders([
                    'Content-Type' => 'Application\json',
                ])->json('POST', '/api/publish/'.$topicName,['msg'=>'helloworld']);

                $response->assertStatus(200);


            }
        }

        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/publish/dummytopic');

        $response->assertStatus(400);

    }
*/
}
