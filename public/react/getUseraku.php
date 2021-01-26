<?php
include "connku.php";

$a = $_GET['opor'];
//$a = $_GET["opor"];
//String $a = 'yandri';

//$sql = "select * from users where name = '$a'";
$sql = "select * from users where email = '$a'";

//$sql = "select * from usersku where name = '$a'";
//$sql = "select * from usersku where name = $a";


//$sql = "select * from users where id = $a";
//$sql = "select * from users where email = $a";
//$sql = "select * from usersku where id = $a";

if(!isset($_GET['opor']))
//if(!isset($_GET["opor"]))
$sql = "select * from users";

//$sql = "select * from usersku";

//$sql = "select * from users";

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
	
	//$item[] = null
	
	


$json = array (
	'result' => 'succes',
	'results' => $item
);

echo json_encode($json);

?>