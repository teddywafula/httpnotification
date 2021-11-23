<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\TopicSeeder;
use Database\Seeders\SubscriberSeeder;
use App\Models\Topic;
use Illuminate\Support\Facades\Log;
class TopicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    public function test_create_topic_with_subscriber()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/subscribe/topic',['url'=>'http://localhost:9000/api/test1']);

        $response->assertStatus(201);
    }

    public function test_create_topic_with_malformed_subscriber_url()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/subscribe/topic',['url'=>'http:localhost:9000/api/test1']);

        $response->assertStatus(422);
    }

    public function test_create_topic_without_subscriber()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/subscribe/topic');

        $response->assertStatus(201);
    }
    public function test_with_new_subscriber_when_topic_exists()
    {
        $this->seed(TopicSeeder::class);
        $this->seed(SubscriberSeeder::class);
        $topicData = Topic::first();
        if(!empty($topicData)){
            $topicName = $topicData->topic;
            $response = $this->withHeaders([
                'Content-Type' => 'Application\json',
            ])->json('POST', '/api/subscribe/'.$topicName,['url'=>'http://localhost:9000/api/test2']);

            $response->assertStatus(201);
        }
        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/subscribe/topicTitle');

        $response->assertStatus(201);

    }


    public function test_when_subscriber_and_topic_exists()
    {
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
                ])->json('POST', '/api/subscribe/' . $topicName, ['url' => $subscriberUrl]);
                $response->assertStatus(201);
            }
        }

        $response = $this->withHeaders([
            'Content-Type' => 'Application\json',
        ])->json('POST', '/api/subscribe/topicTitle');

        $response->assertStatus(201);

    }

}
