 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId 		= 0;
 $DefaultNama		= 0;
 $DefaultKontrakan	= 0;


 $id_kontrakan		= $_POST['id_kontrakan'];
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

 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_kontrakan FROM dt_kontrakan ORDER BY id_kontrakan ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = "kontrakan_update_" . $row['id_kontrakan'];
 $DefaultNama= "kontrakan_2__update" . $row['id_kontrakan'];
 $DefaultKontrakan = "kontrakan_3__update" . $row['id_kontrakan'];
 }
 
 $ImagePath = "../../web/files/kontrakan/$DefaultId.jpg";
 $ImagePathFoto2 = "../../web/files/kontrakan/$DefaultNama.jpg";
 $ImagePathFoto3 = "../../web/files/kontrakan/$DefaultKontrakan.jpg";
 
 $ServerURL = "$DefaultId.jpg";
 $ServerURLFoto2 = "$DefaultNama.jpg";
 $ServerURLFoto3 = "$DefaultKontrakan.jpg";

 
 // $InsertSQL = "INSERT INTO dt_kontrakan (nama, deskripsi, alamat, fasilitas, foto, foto_2, foto_3, id_pemilik, latitude, longitude, altitude, harga, rating, status) values ('$nama', '$deskripsi', '$alamat', '$fasilitas', '$ServerURL', '$ServerURLFoto2', '$ServerURLFoto3', '$id_pemilik', '$latitude', '$longitude','0','$harga', '0', 'Tidak Aktif')";

 $UpdateSQL = "UPDATE dt_kontrakan SET id_kontrakan = 'id_kontrakan', nama = '$nama', deskripsi = '$deskripsi', alamat = '$alamat', fasilitas= '$fasilitas', foto = '$ServerURL', foto_2 = '$ServerURLFoto2', foto_3 = '$ServerURLFoto3', id_pemilik = '$id_pemilik', latitude = '$latitude', longitude = '$longitude', altitude = '$altitude', harga = '$harga', rating ='$rating', status= '$status' WHERE id_kontrakan ='$id_kontrakan' ";

 
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