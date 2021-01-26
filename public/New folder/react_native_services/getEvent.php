<?php
include "conndia.php";
//$sql = "select * from schedule";



$a = $_GET['idUser'];
$sql = "select * from pengguna where id_user = $a";
if(!isset($_GET['idUser']))
$sql = "select * from pengguna";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
       $item[] = array(
		"id"=>$hasil["id"],
		"id_user"=>$hasil["id_user"],
		"nama"=>$hasil["nama"],
		"email"=>$hasil["email"],
		"tgl_lahir"=>$hasil["tgl_lahir"],
		"telp"=>$hasil["telp"],
		"jk"=>$hasil["jk"],
		"pekerjaan"=>$hasil["pekerjaan"],
		"date_create"=>$hasil["date_create"],
		"gambar"=>$hasil["gambar"],
	);
    }


$json = array (
	'result' => 'succes',
	'results' => $item
);

echo json_encode($json);

?>
