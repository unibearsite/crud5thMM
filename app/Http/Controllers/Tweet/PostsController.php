<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class PostsController extends Controller
{
    public function __invoke(Request $request)
    {
      $keyword = $request->input('keyword');

      $query = Tweet::query();

      if(!empty($keyword)) {
        $query->where('content', 'LIKE', "%{$keyword}%");	      
      }
      $tweets = $query->get();

      return view('tweet.posts')->with(['tweets' => $tweets, 'keyword' => $keyword,]);
    }
}
