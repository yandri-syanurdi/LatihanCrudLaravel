<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/admin/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="nama" placeholder="nama">
    <input type="text" name="telepon" placeholder="telepon">
    <input type="text" name="whatsapp" placeholder="whatsapp">
    <input type="text" name="instagram" placeholder="instagram">
    <input type="text" name="facebook" placeholder="facebook">
    <input type="text" name="alamat" placeholder="alamat">
    <input type="file" name="profile">
    <input type="submit" value="Submit">
</form>

</body>
</html>