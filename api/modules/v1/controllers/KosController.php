<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Kos;
use yii\rest\Controller;
use yii\web\Response;


class KosController extends Controller
{

	/*
	GET
	Fungsi untuk mendapatkan semua data kos
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_kos
			$kos = Kos::find()->all();

			$response['master'] = $kos;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan semua data-data kos yang terdekat dari lokasi saat ini
	*/
	public function actionGetAllTerdekat($myLat, $myLng, $jarak){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			$sql = "SELECT dt_kos.id_kos, dt_kos.nama, dt_kos.deskripsi, dt_kos.foto, dt_kos.waktu_post, dt_kos.id_pemilik, dt_kos.latitude, dt_kos.longitude, dt_kos.altitude, dt_kos.harga, dt_kos.rating, dt_kos.status, dt_kos.stok_kamar, dt_kos.jenis_kos,
                    (((acos(sin(('$myLat'*pi()/180))
                    * sin((`latitude`*pi()/180))+cos(('$myLat'*pi()/180))
                    * cos((`latitude`*pi()/180)) * cos((('$myLng'-`longitude`)
                    * pi()/180))))*180/pi())*60*1.1515*1.609344)
                    as jarak FROM `dt_kos`
                    HAVING jarak <= $jarak AND dt_kos.status = 'tersedia'
                    ORDER BY jarak ASC";

			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}
		return $response;
	}


  /*
	GET
	Fungsi untuk mendapatkan data kos di filter by id_kos
	*/
  public function actionById ($id_kos){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
     $sql = "SELECT dt_kos.id_kos, dt_kos.deskripsi as deskripsi_kos, dt_kos.foto as foto_kos_1, dt_kos.foto_2 as foto_kos_2, 
              dt_kos.foto_3 as foto_kos_3, dt_kos.harga as harga_kos, dt_kos.altitude, dt_kos.latitude, dt_kos.longitude, dt_kos.nama as nama_kos, dt_kos.rating as rating_kos, dt_kos.status as status_kos, dt_kos.waktu_post,
              
              tb_pemilik.id_pemilik, tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik, tb_pemilik.foto as foto_pemilik, tb_pemilik.alamat as alamat_pemilik
              
              FROM dt_kos INNER JOIN tb_pemilik
              WHERE dt_kos.id_pemilik = tb_pemilik.id_pemilik
              AND dt_kos.id_kos = '$id_kos'";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
    }
    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah kos terbaru
  */
  public function actionTambahKos(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $nama = $data['nama'];
      $deskripsi = $data['deskripsi'];
      $foto = $data['foto'];
      $foto_2 = $data['foto_2'];
      $foto_3 = $data['foto_3'];
      // $waktu_post = $data['waktu_post'];
      $id_pemilik = $data['id_pemilik'];
      $latitude = $data['latitude'];
      $longitude = $data['longitude'];
      $altitude = $data['altitude'];
      $harga = $data['harga'];
      $rating = '0';
      $status = 'tidak aktif';
      $stok_kamar = $data['stok_kamar'];
      $jenis_kos = $data['jenis_kos'];

      // lakukan insert data
      $kos = new Kos();
      $kos->nama= $nama;
      $kos->deskripsi= $deskripsi;
      $kos->foto= $foto;
      $kos->foto_2= $foto_2;
      $kos->foto_3= $foto_3;
      // $kos->waktu_post= $waktu_post;
      $kos->id_pemilik= $id_pemilik;
      $kos->latitude= $latitude;
      $kos->longitude= $longitude;
      $kos->altitude= $altitude;
      $kos->harga= $harga;
      $kos->rating= $rating;
      $kos->status= $status;
      $kos->stok_kamar= $stok_kamar;
      $kos->jenis_kos= $jenis_kos;

      if($kos->save(false)){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Data Kos Berhasil Ditambah";
				$response['data'] = $kos;
      }else{
        $response['code'] = 0;
				$response['message'] = "Data Kos Gagal Ditambah";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data kos yang sudah ada
  */
  public function actionUpdateKos() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_kos= $data['id_kos'];
      $nama = $data['nama'];
      $deskripsi = $data['deskripsi'];
      $foto = $data['foto'];
      $waktu_post = $data['waktu_post'];
      $id_pemilik = $data['id_pemilik'];
      $latitude = $data['latitude'];
      $longitude = $data['longitude'];
      $altitude = $data['altitude'];
      $harga = $data['harga'];
      $rating = $data['rating'];
      $status = $data['status'];
      $stok_kamar = $data['stok_kamar'];
      $jenis_kos = $data['jenis_kos'];

      $kos = Kos::find()
                      ->where(['id_kos' => $id_kos])
                      ->one();

      if (isset($kos)) {
        // code...
        $kos->nama= $nama;
        $kos->deskripsi= $deskripsi;
        $kos->foto= $foto;
        $kos->waktu_post= $waktu_post;
        $kos->id_pemilik= $id_pemilik;
        $kos->latitude= $latitude;
        $kos->longitude= $longitude;
        $kos->altitude= $altitude;
        $kos->harga= $harga;
        $kos->rating= $rating;
        $kos->status= $status;
        $kos->stok_kamar= $stok_kamar;
        $kos->jenis_kos= $jenis_kos;

        if ($kos->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update Data Kos berhasil";
  				$response['data'] = $kos;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update Data Kos gagal";
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
  Fungsi untuk update data kos tidak aktif menjadi tersedia
  */
  public function actionUpdateKosTersedia() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_kos= $data['id_kos'];
      $status = $data['status'];

      $kos = Kos::find()
                      ->where(['id_kos' => $id_kos])
                      ->one();

      if (isset($kos)) {
        // code...
        $kos->status= 'tersedia';

        if ($kos->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update kos menjadi tersedia berhasil";
  				$response['data'] = $kos;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update kos menjadi tersedia gagal";
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
  Fungsi untuk menghapus kos
  */
    public function actionDelete(){
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_kos= $data['id_kos'];

        $kos = Kos::find()
                        ->where(['id_kos' => $id_kos])
                        ->one();

                        if (isset($kos)) {
                          if($kos->delete()){
                            //jika data berhasil dihapus
                            $response['code'] = 1;
                            $response['message'] = "Data Kos Berhasil Dihapus";
                          }else {
                            // code...
                            $response['code'] = 0;
                            $response['message'] = "Data Kos Gagal Dihapus";
                          }

                        }else {
                            $response['code'] = 0;
                            $response['message'] = "Data tidak ditemukan";
                          }

        }
        return $response;
      }

}
