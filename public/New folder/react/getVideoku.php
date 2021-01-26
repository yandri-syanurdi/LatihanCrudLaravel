<?php
include "conndia.php";
//$sql = "select * from desa";

$a = $_GET['namaTingkat'];
$b = $_GET['namaMapel'];
$sql = "select * from video where nama_tingkat = '$a' and nama_mapel = '$b' " ;
if(!isset($_GET['namaTingkat']))
$sql = "select * from video";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
        $item[] = array(
		"id"=>$hasil["id"],
		"nama"=>$hasil["nama"], 
		"nama_tingkat"=>$hasil["nama_tingkat"], 
		"nama_mapel"=>$hasil["nama_mapel"],
		"deskripsi"=>$hasil["deskripsi"],
		"video"=>$hasil["video"],
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