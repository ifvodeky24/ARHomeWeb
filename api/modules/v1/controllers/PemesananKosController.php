<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\PemesananKos;
use app\models\Pengguna;
use app\models\Kos;
use yii\rest\Controller;
use yii\web\Response;


class PemesananKosController extends Controller
{

  /*
	GET
	Fungsi untuk mendapatkan semua data pesanan kos
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_pemesanan_kos
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
  public function actionGetAllByPemilik($id_pemilik){
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
       
							AND tb_pemesanan_kos.id_pengguna = tb_pengguna.id_pengguna

              GROUP BY tb_pemesanan_kos.id_pemesanan_kos";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
    }

    return $response;
  }

	/*
	GET
	Fungsi untuk melihat history data pemesanan kos filter by id_pengguna dan status
	*/
  public function actionGetAllByPengguna($id_pengguna){
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

              GROUP BY tb_pemesanan_kos.id_pemesanan_kos";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
    }

    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah pemesanan kos
  */
  public function actionBookingKos(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $id_pengguna = $data['id_pengguna'];
      $id_kos = $data['id_kos'];
      // $status = $data['status'];
      // $review = $data['review'];
      // $rating = $data['rating'];

      // lakukan insert data
      $pemesanan_kos = new PemesananKos();
      $pemesanan_kos->id_pengguna= $id_pengguna;
      $pemesanan_kos->id_kos= $id_kos;
      $pemesanan_kos->status= "booking";
      $pemesanan_kos->review= "";
      $pemesanan_kos->rating= 0;

      $pengguna = Pengguna::find()
                  ->where(['id_pengguna' => $pemesanan_kos->id_pengguna])
                  ->one();

     if ($pengguna->status_memesan == 0) {
          # code...
        if($pemesanan_kos->save(false)){

        $kos = Kos::find()
                  ->where(['id_kos' => $pemesanan_kos->id_kos])
                  ->one();

        

          $pengguna->status_memesan = 1;
          
          $kos->stok_kamar -= 1;

          // jika data berhasil diupdate
          if ($kos->save(false) && $pengguna->save(false)) {
            $response['code'] = 1;
            $response['message'] = "Pemesanan Kos Berhasil dibooking";
            $response['data'] = $pemesanan_kos;

              if ($kos->stok_kamar == 0) {
                # code...
                $kos->status = "tidak tersedia";

                if($kos->save()){
                  $response['message'] = "Pemesanan Kos Berhasil dibooking,Status Kos tidak tersedia";
                }
              }

          }else {
            $response['code'] = 0;
            $response['message'] = "Status kos dan pengguna gagal update";
            $response['data'] = null;
          }

      }else{
        $response['code'] = 0;
        $response['message'] = "Pemesanan Kos Gagal ditambah";
        $response['data'] = null;
      }

    }else{
        $response['code'] = 0;
          $response['message'] = "Anda masih dalam status memesan";
          $response['data'] = null;
        }
    }
      return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data status kos dari booking menjadi dalam pemesanan
  */

  public function actionUpdatePemesananKosDalamPemesanan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
      // $status = $data['status'];

      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        $pemesanan_kos->status= "dalam pemesanan";

        if ($pemesanan_kos->update(false)) {
					$response['code'] = 1;
                    $response['message'] = "Status pemesanan kos berhasil diupdate menjadi dalam pemesanan";
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

	/*
  UPDATE
  Fungsi untuk update menambahkan rating dan review kos
  */

  public function actionUpdateRatingReviewKos() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
			// $status = $data['status'];
      $review = $data['review'];
      $rating = $data['rating'];

      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        $pemesanan_kos->review= $review;
        $pemesanan_kos->rating= $rating;

        if ($pemesanan_kos->update(false)) {
					$response['code'] = 1;
                    $response['message'] = "Rating dan Review Kos berhasil ditambah";
                    $response['data'] = $pemesanan_kos;

        }else {
          $response['code'] = 0;
  				$response['message'] = "Rating dan Review Kos gagal ditambah";
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

  public function actionUpdatePemesananKosSelesai() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
      // $status = $data['status'];
      

      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        $pemesanan_kos->status= "selesai";
        
        $pengguna = Pengguna::find()
                        ->where(['id_pengguna'=> $pemesanan_kos->id_pengguna])
                        ->one();
        $pengguna->status_memesan = 0;

        $kos = Kos::find()
                  ->where(['id_kos' => $pemesanan_kos->id_kos])
                  ->one();
        if ($kos->stok_kamar == 0) {
          # code...
          $kos->status = "tersedia";

        }
        $kos->stok_kamar += 1;

          if ($pemesanan_kos->update(false)) {
            
                      // jika data berhasil diupdate
                    if ($kos->update(false) && $pengguna->update(false)) {
                      $response['code'] = 1;
                      $response['message'] = "Status pemesanan kos berhasil diupdate menjadi selesai";
                      $response['data'] = $pemesanan_kos;
                    }else {
                      $response['code'] = 0;
                      $response['message'] = "Status pemesanan kos gagal diupdate menjadi selesai";
                      $response['data'] = null;
                    }

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
