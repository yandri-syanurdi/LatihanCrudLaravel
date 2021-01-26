<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/guru/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="nama" placeholder="nama">
    <input type="text" name="nama_belakang" placeholder="nama_belakang">
    <input type="text" name="jenis_kelamin" placeholder="jenis_kelamin">
    <input type="text" name="agama" placeholder="agama">
    <input type="text" name="telepon" placeholder="telepon">
    <input type="text" name="tgl_lahir" placeholder="tgl_lahir">
    <input type="text" name="suku" placeholder="suku">
    <input type="text" name="alamat" placeholder="alamat">
    <input type="file" name="profile">
    <input type="submit" value="Submit">
</form>

</body>
</html>