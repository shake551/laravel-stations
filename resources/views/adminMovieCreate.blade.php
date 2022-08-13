<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <form action="{{ url('/admin/movies/store') }}" method="post">
        {{ csrf_field() }}
        <label for="">タイトル</label>
        <input type="text" name="title" id="title">
        <label for="">画像URL</label>
        <input type="text" name="image_url" id="image_url">
        <label for="">公開日</label>
        <input type="text" name="published_year" id="published_year">
        <label for="">概要</label>
        <input type="text" name="description" id="description">
        <label for="">上映中かどうか</label>
        <input type="checkbox" name="is_showing" id="is_showing">

        <input type="submit" value="送信">
    </form>

</body>
</html>
