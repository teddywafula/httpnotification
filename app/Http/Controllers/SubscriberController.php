<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;
class SubscriberController extends Controller
{
    //
    public function test1(Request $request){
        Log::info($request->all());
    }

    public function test2(Request $request){
        Log::info($request->all());
    }


}
