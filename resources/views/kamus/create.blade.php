<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/kamus/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="b_indonesia" placeholder="b_indonesia">
    <input type="text" name="b_inggris" placeholder="b_inggris">
    <input type="file" name="video_isyarat">
    <input type="submit" value="Submit">
</form>

</body>
</html>