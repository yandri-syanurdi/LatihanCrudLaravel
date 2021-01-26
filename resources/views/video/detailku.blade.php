<!-- details.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
</head>
<body>
<h2>NAMA VIDE : {{$data->nama}}</h2>
<h3>NAMA MAPEL  : {{$data->nama_tingkat}}</h3>
<h3>NAMA MAPEL  : {{$data->nama_mapel}}</h3>
<h3>DESKRIPSI : {{$data->deskripsi}}</h3>
<p>
    <iframe src="{{url('storage/'.$data->video)}}" style="width: 600px; height: 500px;"></iframe>
</p>
</body>
</html>