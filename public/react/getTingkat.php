<?php
include "conndia.php";
$sql = "select * from tingkat";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
        $item[] = array(
		"id"=>$hasil["id"],
		"nama"=>$hasil["nama"], 
		"deskripsi"=>$hasil["deskripsi"], 
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