<?php
include "conndia.php";
//$sql = "select * from users where role = 'siswa' ORDER BY name DESC LIMIT 0,10";
$sql = "select * from users where role = 'siswa' ORDER BY created_at DESC LIMIT 0,10";

$query=mysqli_query($konek,$sql);

if ($query === FALSE) {
    die(mysqli_error());
}
while($hasil = mysqli_fetch_array($query))
    {
       $item[] = array(
		"id"=>$hasil["id"],
		"role"=>$hasil["role"],
		"name"=>$hasil["name"],
		"email"=>$hasil["email"],
		"email_verified_at"=>$hasil["email_verified_at"],
		"password"=>$hasil["password"],
		"gambar"=>$hasil["gambar"],
		"remember_token"=>$hasil["remember_token"],
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
