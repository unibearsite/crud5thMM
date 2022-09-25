<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
      $tweet = new Tweet;
      $tweet->user_id = $request->userId(); //ここでUserIdを保存
      $tweet->content = $request->tweet(); //ここでtweetを保存
      $tweet->save();
      return redirect()->route('tweet.index');
    }
}
