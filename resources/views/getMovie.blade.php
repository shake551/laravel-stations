<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <form method="GET" action="{{ url('/movies') }}">
        <input type="radio" name="is_showing" value="0">公開予定
        <input type="radio" name="is_showing" value="1">公開中
        <input type="search" placeholder="検索" name="keyword" value="@if (isset($keyword)) {{ $keyword }} @endif">
        <div>
            <button type="submit">検索</button>
        </div>
    </form>
    <ul>
    @foreach ($movies as $movie)
        <li>{{ $movie->title }}</li>
        <li>画像URL: {{ $movie->image_url }}</li>
    @endforeach
    </ul>
</body>
</html>
