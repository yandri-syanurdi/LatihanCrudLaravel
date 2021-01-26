<?php
include "conndia.php";
//$sql = "select * from users where role = 'siswa' ORDER BY name DESC LIMIT 0,10";
$sql = "select * from users where role = 'siswa' ORDER BY created_at DESC LIMIT 0,10";
// $query    =mysqli_query($conn, "SELECT * FROM tb_siswa ORDER BY id_siswa DESC LIMIT 1");
// SELECT * FROM tb_siswa WHERE id_siswa IN (SELECT MAX(id_siswa) FROM tb_siswa)
// $query    =mysqli_query($conn, "SELECT * FROM tb_siswa ORDER BY ipk DESC LIMIT 5");
// https://jagowebdev.com/menampilkan-data-tabel-database-mysql-dengan-php/
// $sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas, harga*kuantitas AS total_byr FROM sales';



//SELECT * FROM nama_tabel ORDER BY nama_kolom ASC
//SELECT * FROM murid ORDER BY nama ASC
//SELECT * FROM murid ORDER BY nama DESC
//SELECT * FROM nama_tabel WHERE nama_kolom = "isi_kolom"
//SELECT * FROM murid WHERE alamat = "Ciawi"
//SELECT * FROM nama_tabel WHERE nama_kolom LIKE "huruf_depan%"
//SELECT * FROM murid WHERE alamat LIKE "C%"
//SELECT * FROM murid WHERE nama LIKE "%U%"


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
