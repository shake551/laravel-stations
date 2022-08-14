<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <form action="{{ url('/admin/movies/'.$movie->id.'/update') }}" method="POST">
        @method('PATCH')
        {{ csrf_field() }}
        <label for="">タイトル</label>
        <input type="text" name="title" id="title" value="{{$movie->title}}">
        <label for="">画像URL</label>
        <input type="text" name="image_url" id="image_url" value="{{$movie->image_url}}">
        <label for="">公開日</label>
        <input type="text" name="published_year" id="published_year" value="{{$movie->published_year}}">
        <label for="">概要</label>
        <input type="text" name="description" id="description" value="{{$movie->description}}">
        <label for="">上映中かどうか</label>
        <input type="checkbox" name="is_showing" id="is_showing" @checked($movie->is_showing) value="1">{{$movie->is_showing?"上映中":"上映予定"}}

        <input type="submit" value="送信">
    </form>
</body>
</html>
