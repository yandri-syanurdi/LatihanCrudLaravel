<?php
include "conndia.php";
//$sql = "select * from desa";

$a = $_GET['namaTingkat'];
$sql = "select * from mapel_tingkat where nama_tingkat = '$a'";
if(!isset($_GET['namaTingkat']))
$sql = "select * from mapel_tingkat";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
        $item[] = array(
		"id"=>$hasil["id"],
		"id_tingkat"=>$hasil["id_tingkat"], 
		"nama_tingkat"=>$hasil["nama_tingkat"], 
		"id_mapel"=>$hasil["id_mapel"], 
		"nama_mapel"=>$hasil["nama_mapel"],
		"gambar"=>$hasil["gambar"],
		"created_at"=>$hasil["created_at"],
		"updated_at"=>$hasil["updated_at"],		
	);
    }


$json = array (
	'result' => 'succes',
	'results' => $item
);

echo json_encode($json);

?>