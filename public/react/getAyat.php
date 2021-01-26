<?php
include "conndia.php";
//$sql = "select * from desa";

$a = $_GET['namaSurat'];
$sql = "select * from daftar_ayat where nama_surat = '$a'";
if(!isset($_GET['namaSurat']))
$sql = "select * from daftar_ayat";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
        $item[] = array(
		"id"=>$hasil["id"],
		"penggalan_ayat"=>$hasil["penggalan_ayat"], 
		"terjemahan"=>$hasil["terjemahan"], 
		"urutan_penggalan"=>$hasil["urutan_penggalan"], 
		"urutan_ayat"=>$hasil["urutan_ayat"], 
		"nama_surat"=>$hasil["nama_surat"],
		"gambar_ayat"=>$hasil["gambar_ayat"],
		"video_terjemahan"=>$hasil["video_terjemahan"],
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