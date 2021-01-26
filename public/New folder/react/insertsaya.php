l<?php

//$obj = file_get_contents('php://input');
//$obj = json_decode($obj, true); // menjadikan array

//$json = file_get_contents('php://input');
//$obj = json_decode($json, true);



	
//$json = file_get_contents('php://input');	
//$obj = json_decode($json, true);
$obj = $_POST;
$files = $_FILES;

$objek = json_decode($json, true);

//die(json_encode(array('isSukses' => 0, 'isMessage' => $obj )));
//die(json_encode(array('isSukses' => 0, 'isMessage' => $files )));

$folderUpload = "upload/imgs";

//$name = $obj['name'];
//$email = $obj['email'];
//$phone_number = $obj['phone_number'];

if(!file_exists($folderUpload)){
    mkdir($folderUpload, 777, true);
}

$namaGambar = $folderUpload."/". rand()."-".time().".jpeg";

if(move_uploaded_file($files['photo']['tmp_name'], $namaGambar )){
    //die(json_encode(array('isSukses' => 1, 'isMessage' => 'Sukses upload photo' )));
//kita rubah dahulu tgl_lahir ke format d-m-y;
//$tgl_lahir = date('Y-m-d', strtotime($obj['tgl_lahir']));
// rewrite variable yg dikirim dari React
//$obj['tgl_lahir'] = $tgl_lahir;

//$name = $obj['name'];
//$email = $obj['email'];
//$phone_number = $obj['phone_number'];

//$name = String($obj['name']);
//$email = String($obj['email']);
//$phone_number = String($obj['phone_number']);


//$obj['name'] = $name;
//$obj['email'] = $email;
//$obj['phone_number'] = $phone_number;

//$obj['name'];
//$obj['email'];
//$obj['phone_number'];

$obj['gambar'] = $namaGambar;







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

$queryStr = "INSERT INTO usersku SET ".join(",",$queryStr);
$tampildata = "INSERT INTO usersku(name, email, phone_number) VALUES('$name', '$email', '$phone_number')";
$savedata = "INSERT INTO usersku(name, email, phone_number, gambar) VALUES('$name', '$email', '$phone_number', '$gambar')";

// koneksi ke database

$koneksiDB = @mysqli_connect("localhost","root","","tr_users",3306);



if(mysqli_connect_errno()) {
    $results['isMessage'] = "Gagal koneksi ke Database ".mysqli_connect_error();
    die(json_encode($results));
}



// $results['isMessage'] = $obj['nama'];


//jika sukses koneksi ke database jalankan kode dibawahnya ( Query nya )

$execQuery = mysqli_query($koneksiDB, $queryStr );

if($execQuery){
    $results = array('isSukses' => 1, 'isMessage'=> 'Success Simpan data');
}else {
    $results['isMessage'] = "Mysqli Error Query: ".mysqli_error($koneksiDB);
}



echo json_encode($results);
    
}else { //jika gagal upload
    die(json_encode(array('isSukses' => 0, 'isMessage' => 'Gagal upload photo' )));
    
}


	



