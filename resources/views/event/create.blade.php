<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<!-- <form action="/files" method="POST" enctype="multipart/form-data"> -->
<form action="{{ URL::to('/event/create') }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <!-- @csrf -->
    <input type="text" name="acara" placeholder="acara">
    <input type="text" name="tanggal_mulai" placeholder="tanggal_mulai">
    <input type="text" name="tanggal_selesai" placeholder="tanggal_selesai">
    <input type="text" name="lokasi" placeholder="lokasi">
    <input type="text" name="kegiatan" placeholder="kegiatan">
    <input type="text" name="kontak" placeholder="kontak">
    <input type="file" name="brosur">
    <input type="submit" value="Submit">
</form>

</body>
</html>