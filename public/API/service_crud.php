<?php

//$obj = file_get_contents('php://input');
//$obj = json_decode($obj, true); // menjadikan array

$obj = $_POST;
$files = $_FILES;

//die(json_encode(array('isSukses' => 0, 'isMessage' => $obj )));
//die(json_encode(array('isSukses' => 0, 'isMessage' => $files )));

$folderUpload = "upload/imgs";

if(!file_exists($folderUpload)){
    mkdir($folderUpload, 777, true);
}

if(move_uploaded_file($files['photo']['tmp_name'], $folderUpload."/". rand()."-".time().".jpeg" )){
    //die(json_encode(array('isSukses' => 1, 'isMessage' => 'Sukses upload photo' )));
//kita rubah dahulu tgl_lahir ke format d-m-y;
$tgl_lahir = date('Y-m-d', strtotime($obj['tgl_lahir']));
// rewrite variable yg dikirim dari React
$obj['tgl_lahir'] = $tgl_lahir;

$results = array('isSukses' => 0, 'isMessage' => 'Gagal Simpan');
$queryStr = array();

//GENERATE QUERY INSERT DISINI SAYA PAKAI SET
/*
INSERT INTO table_name
SET
    nama = 'YANDRI SYANURDI',
    jk='0',
    ...
*/
foreach($obj as $key => $value){
    $queryStr[] = "$key='$value'";
    
}

$queryStr = "INSERT INTO people SET ".join(",",$queryStr);

// koneksi ke database

$koneksiDB = @mysqli_connect("localhost","root","","tutorial_react_native",3306);

if(mysqli_connect_errno()) {
    $results['isMessage'] = "Gagal koneksi ke Database ".mysqli_connect_error();
    die(json_encode($results));
}



// $results['isMessage'] = $obj['nama'];


//jika sukses koneksi ke database jalankan kode dibawahnya ( Query nya )

$execQuery = mysqli_query($koneksiDB, $queryStr);

if($execQuery){
    $results = array('isSukses' => 1, 'isMessage'=> 'Success Simpan data');
}else {
    $results['isMessage'] = "Mysqli Error Query: ".mysqli_error($koneksiDB);
}



echo json_encode($results);
    
}else { //jika gagal upload
    die(json_encode(array('isSukses' => 0, 'isMessage' => 'Gagal upload photo' )));
    
}


