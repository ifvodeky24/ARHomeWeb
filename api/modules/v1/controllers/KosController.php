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
	Fungsi untuk mendapatkan semua data-data kos
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
	Fungsi untuk mendapatkan data kos filter by id_kos
	*/

  public function actionById ($id_kos){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $kos = Kos::find()
                      ->where(['id_kos' => $id_kos])
                      ->all();

                      $response['master'] = $kos;
    }

    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah kos
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

      // lakukan insert data
      $kos = new Kos();
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

      if($kos->save()){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Tambah Kos berhasil";
				$response['data'] = $kos;
      }else{
        $response['code'] = 0;
				$response['message'] = "Tambah Kos gagal";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data kos
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

        if ($kos->update()) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $kos;
        }else {
          $response['code'] = 0;
  				$response['message'] = "Update gagal";
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
  Fungsi untuk delete kos
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
                            $response['message'] = "Delete berhasil";
                          }else {
                            // code...
                            $response['code'] = 0;
                            $response['message'] = "Delete Gagal";
                          }

                        }else {
                            $response['code'] = 0;
                            $response['message'] = "Data tidak ditemukan";
                          }

        }
        return $response;
      }

}
