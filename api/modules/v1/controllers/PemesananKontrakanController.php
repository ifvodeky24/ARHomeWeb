<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\PemesananKontrakan;
use yii\rest\Controller;
use yii\web\Response;


class PemesananKontrakanController extends Controller
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
			$pemesanan_kontrakan = PemesananKontrakan::find()->all();

			$response['master'] = $pemesanan_kontrakan;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan data pemesanan kontrakan filter by id_pemesanan_kontrakan
	*/

  public function actionById ($id_pemesanan_kontrakan){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $pemesanan_kontrakan = PemesananKontrakan::find()
                      ->where(['id_pemesanan_kontrakan' => $id_pemesanan_kontrakan])
                      ->one();

                      $response['master'] = $pemesanan_kontrakan;
    }

    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah pemesanan kontrakan
  */

  public function actionTambahPemesananKontrakan(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $id_pengguna = $data['id_pengguna'];
      $id_kontrakan = $data['id_kontrakan'];
      $status = $data['status'];
      $review = $data['review'];
      $rating = $data['rating'];

      // lakukan insert data
      $pemesanan_kontrakan = new PemesananKontrakan();
      $pemesanan_kontrakan->id_pengguna= $id_pengguna;
      $pemesanan_kontrakan->id_kontrakan= $id_kontrakan;
      $pemesanan_kontrakan->status= $status;
      $pemesanan_kontrakan->review= $review;
      $pemesanan_kontrakan->rating= $rating;

      if($pemesanan_kontrakan->save()){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Tambah Pemesanan Kontrakan berhasil";
				$response['data'] = $pemesanan_kontrakan;
      }else{
        $response['code'] = 0;
				$response['message'] = "Tambah Pemesanan Kontrakan gagal";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data pemesanan kontrakan
  */

  public function actionUpdatePemesananKontrakan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kontrakan= $data['id_pemesanan_kontrakan'];
      $id_pengguna = $data['id_pengguna'];
      $id_kontrakan = $data['id_kontrakan'];
      $status = $data['status'];
      $review = $data['review'];
      $rating = $data['rating'];

      $pemesanan_kontrakan = PemesananKontrakan::find()
                      ->where(['id_kos' => $id_pemesanan_kontrakan])
                      ->one();

      if (isset($pemesanan_kontrakan)) {
        // code...
        $pemesanan_kontrakan->id_pengguna= $id_pengguna;
        $pemesanan_kontrakan->id_kontrakan= $id_kontrakan;
        $pemesanan_kontrakan->status= $status;
        $pemesanan_kontrakan->review= $review;
        $pemesanan_kontrakan->rating= $rating;

        if ($pemesanan_kontrakan->update()) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $pemesanan_kontrakan;
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
