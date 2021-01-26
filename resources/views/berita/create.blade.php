<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/berita/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="judul" placeholder="judul">
    <input type="text" name="tanggal" placeholder="tanggal">
    <input type="text" name="tempat" placeholder="tempat">
    <input type="text" name="deskripsi" placeholder="deskripsi">
    <input type="file" name="video">
    <input type="submit" value="Submit">
</form>

</body>
</html>