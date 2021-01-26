<?php 

require_once 'koneksiku.php';

$type = $_GET['item_type'];

if (isset($_GET['key'])) {
    $key = $_GET["key"];
    if ($type == 'users') {
        $query = "SELECT * FROM eventq WHERE nama LIKE '%$key%'";
        $result = mysqli_query($konek, $query);
        $response = array();
        while( $row = mysqli_fetch_assoc($result) ){
            array_push($response, 
            array(
                'id'=>$row['id'], 
                'nama'=>$row['nama'], 
                'tanggal'=>$row['tanggal'],
                'tempat'=>$row['tempat'],
				'gambar'=>$row['gambar'],
				
				) 
            );
        }
        echo json_encode($response);   
    }
} else {
    if ($type == 'users') {
        $query = "SELECT * FROM eventq";
        $result = mysqli_query($konek, $query);
        $response = array();
        while( $row = mysqli_fetch_assoc($result) ){
            array_push($response, 
            array(
               'id'=>$row['id'], 
                'nama'=>$row['nama'], 
                'tanggal'=>$row['tanggal'],
                'tempat'=>$row['tempat'],
				'gambar'=>$row['gambar'],
				) 
            );
        }
        echo json_encode($response);   
    }
}

mysqli_close($konek);

?>