<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <table>
        <tr>
            <th>タイトル</th>
            <th>画像URL</th>
            <th>公開日</th>
            <th>概要</th>
            <th>上映中かどうか</th>
        </tr>
    @foreach ($movies as $movie)
        <tr>
            <td>タイトル: {{ $movie->title }}</td>
            <td>画像URL: {{ $movie->image_url }}</td>
            <td>公開日: {{ $movie->published_year }}</td>
            <td>概要: {{ $movie->description }}</td>
            @if ($movie->is_showing)
                <td>上映中</td>
            @else
                <td>上映予定</td>
            @endif
        </tr>
    @endforeach
</table>
</body>
</html>
