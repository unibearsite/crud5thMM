<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TwiBOX | CRUD5TH</title>
</head>
<body>
  <h1>ツイートを編集</h1>
  <div>
    <a href="{{ route('tweet.index') }}">戻る</a>
    <p>編集フォーム</p>
    @if (session('feedback.success'))<p style="color: green;">{{ session('feedback.success') }}</p>@endif
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
       @method('PUT')
       @csrf
       <label for="tweet-content">ツイート</label>
       <span>140文字まで</span>
       <textarea id="tweet-content" type="text" name="tweet" placeholder="ツイートを入力">{{ $tweet->content }}</textarea>
       @error('tweet')<p style="color: red;">{{ $message }}</p>@enderror
       <button type="submit">編集</button>
    </form>
  </div>
</body>
</html>
