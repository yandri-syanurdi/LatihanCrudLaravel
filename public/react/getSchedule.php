<?php
include "conndia.php";
$sql = "select * from schedule";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
       $item[] = array(
		"id"=>$hasil["id"],
		"kegiatan"=>$hasil["kegiatan"],
		"tanggal_mulai"=>$hasil["tanggal_mulai"],
		"tanggal_selesai"=>$hasil["tanggal_selesai"],
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
