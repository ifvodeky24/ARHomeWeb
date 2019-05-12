 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId 	= 0;
 $DefaultNama = 0;
 $DefaultKos = 0;

 $id_kos			= $_POST['id_kos'];
 $nama 				= $_POST['nama'];
 $deskripsi 		= $_POST['deskripsi'];
 $alamat 			= $_POST['alamat'];
 $fasilitas 		= $_POST['fasilitas'];
 $foto			    = $_POST['foto'];
 $foto_2 		    = $_POST['foto_2'];
 $foto_3 			= $_POST['foto_3'];
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
 
 $DefaultId = "kos_update" . $row['id_kos'];
 $DefaultNama= "kos_2_update" . $row['id_kos'];
 $DefaultKos= "kos_3_update" . $row['id_kos'];
 }
 
 $ImagePath = "../../web/files/kos/$DefaultId.jpg";
 $ImagePathFoto2 = "../../web/files/kos/$DefaultNama.jpg";
 $ImagePathFoto3 = "../../web/files/kos/$DefaultKos.jpg";
 
 $ServerURL = "$DefaultId.jpg";
 $ServerURLFoto2 = "$DefaultNama.jpg";
 $ServerURLFoto3 = "$DefaultKos.jpg";

 
 // $InsertSQL = "INSERT INTO dt_kos (nama, deskripsi, alamat, fasilitas, foto, foto_2, foto_3, id_pemilik, latitude, longitude, altitude, harga, rating, status, stok_kamar, jenis_kos) values ('$nama', '$deskripsi', '$alamat', '$fasilitas', '$ServerURL', '$ServerURLFoto2', '$ServerURLFoto3', '$id_pemilik', '$latitude', '$longitude','0','$harga', '0', 'Tidak Aktif', '$stok_kamar', '$jenis_kos')";

 $UpdateSQL = "UPDATE dt_kos SET id_kos = 'id_kos', nama = '$nama', deskripsi = '$deskripsi', alamat = '$alamat', fasilitas= '$fasilitas', foto = '$ServerURL', foto_2 = '$ServerURLFoto2', foto_3 = '$ServerURLFoto3', id_pemilik = '$id_pemilik', latitude = '$latitude', longitude = '$longitude', altitude = '$altitude', harga = '$harga', rating ='$rating', status= '$status', stok_kamar= '$stok_kamar', jenis_kos= '$jenis_kos' WHERE id_kos ='$id_kos' ";
 
 if(mysqli_query($conn, $UpdateSQL)){

 file_put_contents($ImagePath, base64_decode($foto));
 file_put_contents($ImagePathFoto2, base64_decode($foto_2));
 file_put_contents($ImagePathFoto3, base64_decode($foto_3));

 echo "Data berhasil disimpan";
 }
 
 mysqli_close($conn);
 }else{
 echo "Silahkan Coba Lagi";
 
 }

?>