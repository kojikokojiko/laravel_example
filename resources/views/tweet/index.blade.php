<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1 class="bg-gray-400">つぶやきアプリsfsss</h1>
    <div>
        <p>投稿フォーム</p>
        @if (session('feedback.success'))
            <p style="color:green;">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.create') }}" method="POST">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140字まで</span>
            <textarea name="tweet" id="tweet-content" placeholder="つぶやきを入力"></textarea>
            @error('tweet')
            <p style="color:red;">{{$message}}</p>
            @enderror
                
            <button type="submit">つぶやく</button>
        </form>
        @foreach($tweets as $tweet)
        <details>
            <summary>{{ $tweet->content }}</summary>
            <div>
                <a href="{{route('tweet.update.index',['tweetId'=>$tweet->id])}}">編集</a>
            </div>
            <form action="{{route('tweet.delete',['tweetId'=>$tweet->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">削除</button>
            </form>
        </details>
        

        @endforeach

    </div>
</body>
</html>