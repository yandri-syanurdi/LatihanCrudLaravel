<?php
include "conndia.php";
$sql = "select * from desa";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
        $item[] = array(
		"id_desa"=>$hasil["id_desa"],
		"nama_desa"=>$hasil["nama_desa"], 
		"alamat"=>$hasil["alamat"], 
		"gambar_desa"=>$hasil["gambar_desa"], 
		"nama_kat"=>$hasil["nama_kat"], 
	);
    }


$json = array (
	'result' => 'succes',
	'results' => $item
);

echo json_encode($json);

?>