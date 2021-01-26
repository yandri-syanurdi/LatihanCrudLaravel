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
		"email"=>$hasil["email"],
		"password"=>$hasil["password"],
		
		
	);
    }


$json = array (
	'result' => 'succes',
	'results' => $item
);

echo json_encode($json);

?>