<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\PemesananKos;
use app\models\Kos;
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
	GET
	Fungsi untuk mendapatkan data pemesanan kos filter by id_pemilik dan status
	*/

  public function actionGetAllByPemilik($id_pemilik, $status){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $sql = "SELECT tb_pemesanan_kos.id_pemesanan_kos, tb_pemesanan_kos.status, tb_pemesanan_kos.review, tb_pemesanan_kos.rating,
							dt_kos.nama as nama_kos, dt_kos.foto as foto_kos, dt_kos.harga,
							tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik,
							tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna,
							tb_pengguna.no_handphone as no_handphone_pengguna, tb_pengguna.foto as foto_pengguna
							FROM tb_pemesanan_kos INNER JOIN dt_kos, tb_pemilik, tb_pengguna
							WHERE tb_pemesanan_kos.id_kos = dt_kos.id_kos
							AND dt_kos.id_pemilik = tb_pemilik.id_pemilik
							AND tb_pemilik.id_pemilik = '$id_pemilik'
              AND tb_pemesanan_kos.status = '$status'
							AND tb_pemesanan_kos.id_pengguna = tb_pengguna.id_pengguna";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
    }

    return $response;
  }

	/*
	GET
	Fungsi untuk melihat history data pemesanan kos filter by id_pengguna dan status
	*/

  public function actionGetAllByPengguna($id_pengguna, $status){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $sql = "SELECT tb_pemesanan_kos.id_pemesanan_kos, tb_pemesanan_kos.status, tb_pemesanan_kos.review, tb_pemesanan_kos.rating,
							dt_kos.nama as nama_kos, dt_kos.foto as foto_kos, dt_kos.harga,
							tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik,
							tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna,
							tb_pengguna.no_handphone as no_handphone_pengguna, tb_pengguna.foto as foto_pengguna
							FROM tb_pemesanan_kos INNER JOIN dt_kos, tb_pemilik, tb_pengguna
							WHERE tb_pemesanan_kos.id_kos = dt_kos.id_kos
							AND tb_pemesanan_kos.id_pengguna = tb_pengguna.id_pengguna
							AND tb_pengguna.id_pengguna = '$id_pengguna'
              AND tb_pemesanan_kos.status = '$status' ";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
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

      if($pemesanan_kos->save(false)){
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
  Fungsi untuk update data status kos dari booking menjadi dalam pemesanan
  */

  public function actionUpdateStatusPemesananKos() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
      $status = $data['status'];

      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        // $pemesanan_kos->id_pengguna= $id_pengguna;
        // $pemesanan_kos->id_kos= $id_kos;
        $pemesanan_kos->status= $status;
        // $pemesanan_kos->review= $review;
        // $pemesanan_kos->rating= $rating;

        if ($pemesanan_kos->update(false)) {
					//lakukan decrement stok_kamar pada kos
					$kos = Kos::find()
									->where(['id_kos' => $pemesanan_kos->id_kos])
									->one();

									$kos->stok_kamar -= 1;
									if ($kos->update(false)) {
										$response['code'] = 1;
					  				$response['message'] = "Update pemesanan dan kos berhasil";
					  				$response['data'] = $pemesanan_kos;
									}else {
										$response['code'] = 0;
					  				$response['message'] = "Update pemesanan dan kos gagal";
					  				$response['data'] = null;
									}
          // jika data berhasil diupdate

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
  UPDATE
  Fungsi untuk update data status kos dari booking menjadi dalam pemesanan
  */

  public function actionUpdateStatusPemesananKos() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
      $status = $data['status'];

      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        // $pemesanan_kos->id_pengguna= $id_pengguna;
        // $pemesanan_kos->id_kos= $id_kos;
        $pemesanan_kos->status= $status;
        // $pemesanan_kos->review= $review;
        // $pemesanan_kos->rating= $rating;

        if ($pemesanan_kos->update(false)) {
					//lakukan decrement stok_kamar pada kos
					$kos = Kos::find()
									->where(['id_kos' => $pemesanan_kos->id_kos])
									->one();

									$kos->stok_kamar -= 1;
									if ($kos->update(false)) {
										$response['code'] = 1;
					  				$response['message'] = "Update pemesanan dan kos berhasil";
					  				$response['data'] = $pemesanan_kos;
									}else {
										$response['code'] = 0;
					  				$response['message'] = "Update pemesanan dan kos gagal";
					  				$response['data'] = null;
									}
          // jika data berhasil diupdate

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
