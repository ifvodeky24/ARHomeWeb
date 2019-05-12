 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId 	= 0;
 
 $nama 				= $_POST['nama'];
 $deskripsi 		= $_POST['deskripsi'];
 $alamat 			= $_POST['alamat'];
 $fasilitas 		= $_POST['fasilitas'];
 $foto			    = $_POST['foto'];
 // $foto_2 		    = $_POST['foto_2'];
 // $foto_3 			= $_POST['foto_3'];
 $id_pemilik 		= $_POST['id_pemilik'];
 $latitude 			= $_POST['latitude'];
 $longitude 		= $_POST['longitude'];
 $altitude 			= $_POST['altitude'];
 $harga 			= $_POST['harga'];
 $rating 			= $_POST['rating'];
 $status 			= $_POST['status'];
 $stok_kamar		= $_POST['stok_kamar'];
 $jenis_kos 		= $_POST['jenis_kos'];

 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_kos FROM dt_kos ORDER BY id_kos ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id_kos'];
 // $DefaultNama= $nama;
 }
 
 $ImagePath = "../../web/files/kos/$DefaultId.jpg";
 // $ImagePathFoto2 = "../../web/files/kos/$DefaultNama.jpg";
 
 $ServerURL = "$DefaultId.jpg";
 // $ServerURLFoto2 = "$DefaultNama.jpg";

 
 $InsertSQL = "INSERT INTO dt_kos (nama, deskripsi, alamat, fasilitas, foto, id_pemilik, latitude, longitude, altitude, harga, rating, status, stok_kamar, jenis_kos) values ('$nama', '$deskripsi', '$alamat', '$fasilitas', '$ServerURL', '$id_pemilik', '$latitude', '$longitude','0','$harga', '0', 'Tidak Aktif', '$stok_kamar', '$jenis_kos')";
 

 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($foto));
 // file_put_contents($ImagePathFoto2,base64_decode($foto_2));

 echo "Gambar berhasil diupload";
 }
 
 mysqli_close($conn);
 }else{
 echo "Silahkan Coba Lagi";
 
 }

?>