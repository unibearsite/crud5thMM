<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TwiBOX | CRUD5TH</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <header class="header">
      <form class="searchbox" action="{{ route('tweet.posts') }}" method="GET">
        <input class="search-content" type="text" name="keyword" placeholder="検索内容">
        <input class="search-button" type="submit" value="検索">
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" class="logout" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('ログアウト') }}</x-dropdown-link>
      </form>
    </header>

    <h1>TwiBOX</h1>
    @auth
      <div class="post-box">
        @if (session('feedback.success'))<p style="color: green;">{{ session('feedback.success') }}</p>@endif
        <form action="{{ route('tweet.create') }}" method="post">
          @csrf
          <label for="tweet-content"></label>
          <!--  textareaのname="tweet"でRequestFormのrulesで設定した"'tweet' => 'required|max:140'"と結びついてる-->
	  <textarea id="tweet-content" type="text" name="tweet" placeholder="ツイートを入力"></textarea>
          @error('tweet')<p style="color: red;">{{ $message }}</p>@enderror
          <button class="post-button" type="submit">投稿</button>
        </form>
      </div>
    @endauth
    
    @forelse ($tweets as $tweet)
    @empty
      検索内容が見つかりませんでした
    @endforelse

    @foreach($tweets as $tweet)
      <div class="twi-box">
        <details>
	  <summary>{{ $tweet->content }} {{ $tweet->created_at }} by {{ $tweet->user->name }}</summary>
          @if(\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
	  <div>
	    <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
	    <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
              @method('DELETE')@csrf
	      <button class="normal" type="submit">削除</button>
            </form>
	  </div>
	  @else
            編集できません
          @endif
        </details>
      </div>
    @endforeach
</body>
</html>
