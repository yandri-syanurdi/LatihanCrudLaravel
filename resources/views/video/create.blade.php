<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/video/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="nama" placeholder="nama">
    <input type="text" name="nama_tingkat" placeholder="nama_tingkat">
     <input type="text" name="nama_mapel" placeholder="nama_mapel">
    <input type="text" name="deskripsi" placeholder="deskripsi">
    <input type="file" name="file">
    <input type="submit" value="Submit">
</form>

</body>
</html>