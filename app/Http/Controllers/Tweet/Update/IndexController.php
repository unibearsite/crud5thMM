<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    public function __invoke(Request $request, TweetService $tweetService)
    {
      //リクエストからツイートIDを取得
      $tweetId = (int) $request->route('tweetId');
      if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
        throw new AccessDeniedHttpException();
      }
      //結果を１件取得。存在しない場合はModelNotFoundExceptionの例外になり、その例外をキャッチしない場合は自動的に404 NotFoundとなる
      $tweet = Tweet::where('id', $tweetId)->firstOrFail();
      //ツイートを更新して返す
      return view('tweet.update')->with('tweet', $tweet);
    }
}
