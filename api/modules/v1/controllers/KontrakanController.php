<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Kontrakan;
use yii\rest\Controller;
use yii\web\Response;


class KontrakanController extends Controller
{

  /**
   * Aplikasi web ingin menampilkan semua kontrakan di google maps beserta marker
   */
    public function actionGetAllMarkers(){
        Yii::$app->response->format = Response::FORMAT_XML;

        $response = null;

        if (Yii::$app->request->isGet){
            $sql = "SELECT dt_kontrakan.id_kontrakan, dt_kontrakan.nama as nama_kontrakan, dt_kontrakan.deskripsi as deskripsi_kontrakan, dt_kontrakan.foto as foto_kontrakan_1, dt_kontrakan.foto_2 as foto_kontrakan_2, dt_kontrakan.foto_3 as foto_kontrakan_3, dt_kontrakan.harga as harga_kontrakan, dt_kontrakan.altitude, dt_kontrakan.latitude, dt_kontrakan.longitude, dt_kontrakan.rating as rating_kontrakan, dt_kontrakan.status as status_kontrakan, dt_kontrakan.waktu_post,
              
   tb_pemilik.id_pemilik, tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik, tb_pemilik.foto as foto_pemilik, tb_pemilik.alamat as alamat_pemilik
              
              FROM dt_kontrakan INNER JOIN tb_pemilik
              WHERE dt_kontrakan.id_pemilik = tb_pemilik.id_pemilik
              AND dt_kontrakan.id_kontrakan ORDER BY id_kontrakan DESC";

            $response = Yii::$app->db->createCommand($sql)->queryAll();

            //$this->layout='mainxml';
       // Parsing Karakter-Karakter Khusus
       function parseToXML($htmlStr)
       {
          $xmlStr=str_replace('<','<',$htmlStr);
          $xmlStr=str_replace('>','>',$xmlStr);
          $xmlStr=str_replace('"','"',$xmlStr);
          $xmlStr=str_replace("'","'",$xmlStr);
          $xmlStr=str_replace("&",'&',$xmlStr);
          return $xmlStr;
       }
     
      
     
       // Header File XML
       header("Content-type: text/xml");
     
       // Parent node XML
       echo '<markers>';
     
       // Iterasi baris, masing-masing menghasilkan node-node XML
      foreach($response as $db)
      {
          // Menambahkan ke node dokumen XML
          echo '<marker ';
          echo 'id_kontrakan="' . parseToXML($db['id_kontrakan']) . '" ';
          echo 'nama="' . parseToXML($db['nama']) . '" ';
          echo 'deskripsi="' . parseToXML($db['deskripsi']) . '" ';
          echo 'foto="' . parseToXML($db['foto']) . '" ';
          echo 'foto_2="' . parseToXML($db['foto_2']) . '" ';
          echo 'foto_3="' . parseToXML($db['foto_3']) . '" ';
          echo 'harga="' . parseToXML($db['harga']) . '" ';
          echo 'altitude="' . parseToXML($db['altitude']) . '" ';
          echo 'latitude="' . parseToXML($db['latitude']) . '" ';
          echo 'longitude="' . parseToXML($db['longitude']) . '" ';
          echo 'rating="' . parseToXML($db['rating']) . '" ';
          echo 'status="' . parseToXML($db['status']) . '" ';
          $date = date_create($db['waktu_post']);
          echo 'waktu="' . date_format($date, 'j F Y, \p\u\k\u\l G:i') . '" ';
          echo '/>';
       }
     
       // Akhir File XML (tag penutup node)
       echo '</markers>';
        }   
  }

  /*
	GET
	Fungsi untuk mendapatkan semua data kontrakan
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_kontrakan
			$kontrakan = Kontrakan::find()->
        where(['status'=>'tersedia'])->all();

			$response['master'] = $kontrakan;
		}

		return $response;
	}

	/*
	GET
	Fungsi untuk mendapatkan semua data-data kontrakan yang terdekat dari lokasi saat ini
	*/
	public function actionGetAllTerdekat($myLat, $myLng, $jarak){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			$sql = "SELECT dt_kontrakan.id_kontrakan, dt_kontrakan.nama, dt_kontrakan.deskripsi, dt_kontrakan.alamat, dt_kontrakan.fasilitas, dt_kontrakan.foto, dt_kontrakan.waktu_post, dt_kontrakan.id_pemilik, dt_kontrakan.latitude, dt_kontrakan.longitude, dt_kontrakan.altitude, dt_kontrakan.harga, dt_kontrakan.rating, dt_kontrakan.status,
                    (((acos(sin(('$myLat'*pi()/180))
                    * sin((`latitude`*pi()/180))+cos(('$myLat'*pi()/180))
                    * cos((`latitude`*pi()/180)) * cos((('$myLng'-`longitude`)
                    * pi()/180))))*180/pi())*60*1.1515*1.609344)
                    as jarak FROM `dt_kontrakan`
                    HAVING jarak <= $jarak AND dt_kontrakan.status = 'tersedia'
                    ORDER BY jarak ASC";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	/*
	GET
	Fungsi untuk mendapatkan data kontrakan di filter by id_kontrakan dan di inner join dengan tb_pemilik
	*/
  public function actionById ($id_kontrakan){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
       $sql = "SELECT dt_kontrakan.id_kontrakan, dt_kontrakan.deskripsi as deskripsi_kontrakan, dt_kontrakan.alamat as alamat_kontrakan, dt_kontrakan.fasilitas as fasilitas_kontrakan, dt_kontrakan.foto as foto_kontrakan_1, dt_kontrakan.foto_2 as foto_kontrakan_2, 
              dt_kontrakan.foto_3 as foto_kontrakan_3, dt_kontrakan.harga as harga_kontrakan, dt_kontrakan.altitude, dt_kontrakan.latitude, dt_kontrakan.longitude, dt_kontrakan.nama as nama_kontrakan, dt_kontrakan.rating as rating_kontrakan, dt_kontrakan.status as status_kontrakan, dt_kontrakan.waktu_post,
              
              tb_pemilik.id_pemilik, tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik, tb_pemilik.foto as foto_pemilik, tb_pemilik.alamat as alamat_pemilik
              
              FROM dt_kontrakan INNER JOIN tb_pemilik
              WHERE dt_kontrakan.id_pemilik = tb_pemilik.id_pemilik
              AND dt_kontrakan.id_kontrakan = '$id_kontrakan'";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
    }

    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah kontrakan terbaru
  */
  public function actionTambahKontrakan(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $nama = $data['nama'];
      $deskripsi = $data['deskripsi'];
      $alamat = $data['alamat'];
      $fasilitas = $data['fasilitas'];
      $foto = $data['foto'];
      $foto_2 = $data['foto_2'];
      $foto_3 = $data['foto_3'];
      // $waktu_post = $data['waktu_post'];
      $id_pemilik = $data['id_pemilik'];
      $latitude = $data['latitude'];
      $longitude = $data['longitude'];
      $altitude = '0';
      $harga = $data['harga'];
      $rating = '0';
      $status = 'tidak aktif';

      // lakukan insert data
      $kontrakan = new Kontrakan();
      $kontrakan->nama= $nama;
      $kontrakan->deskripsi= $deskripsi;
      $kontrakan->alamat= $alamat;
      $kontrakan->fasilitas= $fasilitas;
      $kontrakan->foto= $foto;
      $kontrakan->foto_2= $foto_2;
      $kontrakan->foto_3= $foto_3;
      // $kontrakan->waktu_post= $waktu_post;
      $kontrakan->id_pemilik= $id_pemilik;
      $kontrakan->latitude= $latitude;
      $kontrakan->longitude= $longitude;
      $kontrakan->altitude= $altitude;
      $kontrakan->harga= $harga;
      $kontrakan->rating= $rating;
      $kontrakan->status= $status;

      if($kontrakan->save(false)){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Data Kontrakan Berhasil Ditambah";
				$response['data'] = $kontrakan;
      }else{
        $response['code'] = 0;
				$response['message'] = "Data Kontrakan Gagal Ditambah";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data kontrakan yang sudah ada
  */
  public function actionUpdateKontrakan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_kontrakan= $data['id_kontrakan'];
      $nama = $data['nama'];
      $deskripsi = $data['deskripsi'];
      $alamat = $data['alamat'];
      $fasilitas = $data['fasilitas'];
      $foto = $data['foto'];
      $waktu_post = $data['waktu_post'];
      $id_pemilik = $data['id_pemilik'];
      $latitude = $data['latitude'];
      $longitude = $data['longitude'];
      $altitude = $data['altitude'];
      $harga = $data['harga'];
      $rating = $data['rating'];
      $status = $data['status'];

      $kontrakan = Kontrakan::find()
                      ->where(['id_kontrakan' => $id_kontrakan])
                      ->one();

      if (isset($kontrakan)) {
        // code...
        $kontrakan->nama= $nama;
        $kontrakan->deskripsi= $deskripsi;
        $kontrakan->alamat= $alamat;
        $kontrakan->fasilitas= $fasilitas;
        $kontrakan->foto= $foto;
        $kontrakan->waktu_post= $waktu_post;
        $kontrakan->id_pemilik= $id_pemilik;
        $kontrakan->latitude= $latitude;
        $kontrakan->longitude= $longitude;
        $kontrakan->altitude= $altitude;
        $kontrakan->harga= $harga;
        $kontrakan->rating= $rating;
        $kontrakan->status= $status;

        if ($kontrakan->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update Data Kontrakan berhasil";
  				$response['data'] = $kontrakan;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update Data Kontrakan gagal";
  				$response['data'] = null;
        }
      }else {
        $response['code'] = 0;
        $response['message'] = "Data tidak ditemukan";
        $response['data'] = null;
      }
    }
    return $response;

  }

	/*
  UPDATE
  Fungsi untuk update data kontrakan tidak aktif menjadi tersedia
  */
  public function actionUpdateKontrakanTersedia() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_kontrakan= $data['id_kontrakan'];
      $status = $data['status'];

      $kontrakan = Kontrakan::find()
                      ->where(['id_kontrakan' => $id_kontrakan])
                      ->one();

      if (isset($kontrakan)) {
        // code...
        $kontrakan->status= 'tersedia';

        if ($kontrakan->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update kontrakan menjadi tersedia berhasil";
  				$response['data'] = $kontrakan;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update kontrakan menjadi tersedia gagal";
  				$response['data'] = null;
        }
      }else {
        $response['code'] = 0;
        $response['message'] = "Data tidak ditemukan";
        $response['data'] = null;
      }
    }
    return $response;
  }

  /*
  DELETE
  Fungsi untuk menghapus kontrakan
  */
    public function actionDelete(){
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_kontrakan= $data['id_kontrakan'];

        $kontrakan = Kontrakan::find()
                        ->where(['id_kontrakan' => $id_kontrakan])
                        ->one();

                        if (isset($kontrakan)) {
                          if($kontrakan->delete()){
                            //jika data berhasil dihapus
                            $response['code'] = 1;
                            $response['message'] = "Data Kontrakan Berhasil Dihapus";
                          }else {
                            // code...
                            $response['code'] = 0;
                            $response['message'] = "Data Kontrakan Gagal Dihapus";
                          }

                        }else {
                            $response['code'] = 0;
                            $response['message'] = "Data tidak ditemukan";
                          }

        }
        return $response;
      }

}
