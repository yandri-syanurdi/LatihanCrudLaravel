<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/postingan/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="title" placeholder="title">
    <input type="text" name="content" placeholder="content">
    <input type="file" name="thumbnail">
    <input type="submit" value="Submit">
</form>

</body>
</html>