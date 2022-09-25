<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
//TwiBOX
//ツイート画面の表示
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');
//検索リクエストの処理(未実装)
Route::get('/tweet/post', \App\Http\Controllers\Tweet\PostsController::class)->name('tweet.posts');
//ログインしていなければアクセスできないルーティング
Route::middleware('auth')->group(function () {
  //投稿されたツイートの取得
  Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)->middleware('auth')->name('tweet.create');
  //編集画面
  Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)->name('tweet.update.index')->where('tweetId', '[0-9]+');
  //編集リクエストの処理
  Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)->name('tweet.update.put')->where('tweetId', '[0-9]+');
  //削除リクエストの処理
  Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
