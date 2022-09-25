<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;//TweetServiceのインポート
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request, TweetService $tweetService)
    {   
	$tweets = $tweetService->getTweets();//つぶやきの一覧を取得
        return view('tweet.index')->with('tweets', $tweets);
    }
}
