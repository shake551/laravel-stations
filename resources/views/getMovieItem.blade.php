<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    タイトル: {{ $movie->title }}
    画像: <img src="{{$movie->image_url}}">
    公開日: {{ $movie->published_year }}
    概要: {{ $movie->description }}
    @if ($movie->is_showing)
        上映中
    @else
        上映予定
    @endif

    @foreach($schedules as $schedule)
        <p>
            {{ $schedule->start_time }} ~ {{ $schedule->end_time }}
        </p>
    @endforeach
</body>
</html>
