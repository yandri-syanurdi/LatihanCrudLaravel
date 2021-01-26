<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/alquran/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="penggalan_ayat" placeholder="penggalan_ayat">
    <input type="text" name="terjemahan" placeholder="terjemahan">
    <input type="text" name="urutan_penggalan" placeholder="urutan_penggalan">
    <input type="text" name="urutan_ayat" placeholder="urutan_ayat">
     <input type="text" name="nama_surat" placeholder="nama_surat">
    <input type="file" name="gambar_ayat">
    <input type="file" name="video_terjemahan">
    <input type="submit" value="Submit">
</form>

</body>
</html>