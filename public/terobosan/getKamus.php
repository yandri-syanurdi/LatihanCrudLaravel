<?php
include "conndia.php";
$sql = "select * from kamus";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
        $item[] = array(
		"id"=>$hasil["id"],
		"b_indonesia"=>$hasil["b_indonesia"], 
		"b_inggris"=>$hasil["b_inggris"],
		"video_isyarat"=>$hasil["video_isyarat"], 
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