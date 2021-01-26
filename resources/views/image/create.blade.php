<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/image/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="nama" placeholder="nama">
    <input type="text" name="kategori" placeholder="kategori">
    <input type="text" name="deskripsi" placeholder="deskripsi">
    <input type="file" name="file">
    <input type="submit" value="Submit">
</form>

</body>
</html>