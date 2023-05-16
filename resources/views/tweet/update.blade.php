<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1>つぶやきを編集</h1>
    <div>
        <a href="{{route('tweet.index')}}">戻る</a>
        @if (session('feedback.success'))
            <p style="color:green;">{{ session('feedback.success') }}</p>
        @endif
        <p>投稿フォーム</p>
        <form action="{{ route('tweet.update.put',['tweetId'=>$tweet->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140字まで</span>
            <textarea name="tweet" id="tweet-content" placeholder="つぶやきを入力">{{$tweet->content}}</textarea>
            @error('tweet')
            <p style="color:red;">{{$message}}</p>
            @enderror
                
            <button type="submit">編集</button>
        </form>
        {{-- @foreach($tweets as $tweet)
            <p>{{ $tweet->content }}</p>
        @endforeach --}}

    </div>
</body>
</html>