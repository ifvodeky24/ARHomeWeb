<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\PemesananKos;
use yii\rest\Controller;
use yii\web\Response;


class PemesananKosController extends Controller
{
  /*
	GET
	Fungsi untuk mendapatkan semua data-data pesanan
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_pemesanan_kontrakan
			$pemesanan_kos = PemesananKos::find()->all();

			$response['master'] = $pemesanan_kos;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan data pemesanan kos filter by id_pemesanan_kos
	*/

  public function actionById ($id_pemesanan_kos){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

                      $response['master'] = $pemesanan_kos;
    }

    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah pemesanan kos
  */

  public function actionTambahPemesananKos(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $id_pengguna = $data['id_pengguna'];
      $id_kos = $data['id_kos'];
      $status = $data['status'];
      $review = $data['review'];
      $rating = $data['rating'];

      // lakukan insert data
      $pemesanan_kos = new PemesananKos();
      $pemesanan_kos->id_pengguna= $id_pengguna;
      $pemesanan_kos->id_kos= $id_kos;
      $pemesanan_kos->status= $status;
      $pemesanan_kos->review= $review;
      $pemesanan_kos->rating= $rating;

      if($pemesanan_kos->save()){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Tambah Pemesanan Kos berhasil";
				$response['data'] = $pemesanan_kos;
      }else{
        $response['code'] = 0;
				$response['message'] = "Tambah Pemesanan Kos gagal";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data pemesanan kos
  */

  public function actionUpdatePemesananKos() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
      $id_pengguna = $data['id_pengguna'];
      $id_kos = $data['id_kos'];
      $status = $data['status'];
      $review = $data['review'];
      $rating = $data['rating'];

      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        $pemesanan_kos->id_pengguna= $id_pengguna;
        $pemesanan_kos->id_kos= $id_kos;
        $pemesanan_kos->status= $status;
        $pemesanan_kos->review= $review;
        $pemesanan_kos->rating= $rating;

        if ($pemesanan_kos->update()) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $pemesanan_kos;
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


}
