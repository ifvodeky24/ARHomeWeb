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
	Fungsi untuk mendapatkan semua data pemesanan kos
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
	Fungsi untuk mendapatkan data detail pemesanan kos filter by id_pemesanan_kos
	*/
  public function actionById ($id_pemesanan_kos){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      
      $sql = "SELECT tb_pemesanan_kos.id_pemesanan_kos, tb_pemesanan_kos.status, tb_pemesanan_kos.review, tb_pemesanan_kos.rating,
              dt_kos.nama as nama_kos, dt_kos.foto as foto_kos, dt_kos.harga, dt_kos.stok_kamar as stok_kamar_kos, dt_kos.jenis_kos, dt_kos.alamat as alamat_kos,
              tb_pemilik.id_pemilik, tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik, tb_pemilik.foto as foto_pemilik, 
              tb_pengguna.id_pengguna, tb_pengguna.nama_lengkap as nama_lengkap_pengguna,
              tb_pengguna.no_handphone as no_handphone_pengguna, tb_pengguna.foto as foto_pengguna
              FROM tb_pemesanan_kos INNER JOIN dt_kos, tb_pemilik, tb_pengguna
              WHERE tb_pemesanan_kos.id_kos = dt_kos.id_kos
              AND dt_kos.id_pemilik = tb_pemilik.id_pemilik
              AND tb_pemesanan_kos.id_pemesanan_kos = '$id_pemesanan_kos'";

              $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();;
    }

    return $response;
  }

	/*
	GET
	Fungsi untuk mendapatkan history data pemesanan kos filter by id_pemilik
	*/
  public function actionGetAllByPemilik($id_pemilik){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $sql = "SELECT tb_pemesanan_kos.id_pemesanan_kos, tb_pemesanan_kos.status, tb_pemesanan_kos.review, tb_pemesanan_kos.rating,
							dt_kos.nama as nama_kos, dt_kos.foto as foto_kos, dt_kos.harga, dt_kos.stok_kamar as stok_kamar_kos, dt_kos.jenis_kos, dt_kos.alamat as alamat_kos,
							tb_pemilik.id_pemilik, tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik, tb_pemilik.foto as foto_pemilik, 
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
	Fungsi untuk melihat history data pemesanan kos filter by id_pengguna
	*/
  public function actionGetAllByPengguna($id_pengguna){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $sql = "SELECT tb_pemesanan_kos.id_pemesanan_kos, tb_pemesanan_kos.status, tb_pemesanan_kos.review, tb_pemesanan_kos.rating,
              dt_kos.nama as nama_kos, dt_kos.foto as foto_kos, dt_kos.harga, dt_kos.stok_kamar as stok_kamar_kos, dt_kos.jenis_kos, dt_kos.alamat as alamat_kos,
              tb_pemilik.id_pemilik, tb_pemilik.nama_lengkap as nama_lengkap_pemilik, tb_pemilik.no_handphone as no_handphone_pemilik, tb_pemilik.foto as foto_pemilik, 
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
  Fungsi untuk menambah pemesanan kos / booking
  */
  public function actionBookingKos(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $id_pengguna = $data['id_pengguna'];
      $id_kos = $data['id_kos'];
      
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
            $response['message'] = "Kos Berhasil dibooking";
            $response['data'] = $pemesanan_kos;

              if ($kos->stok_kamar == 0) {
                # code...
                $kos->status = "tidak tersedia";

                if($kos->save()){
                  $response['message'] = "Kos Berhasil dibooking & Status Kos menjadi tidak tersedia";
                }
              }

          }else {
            $response['code'] = 0;
            $response['message'] = "Status kos dan pengguna gagal diupdate";
            $response['data'] = null;
          }

      }else{
        $response['code'] = 0;
        $response['message'] = "Kos gagal dibooking";
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
  DELETE
  Fungsi untuk delete data kos untuk membatalkan booking
  */
  public function actionBatalBookingKos() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
   
      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        
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

          if ($pemesanan_kos->delete()) {
            
                      // jika data berhasil didelete
                    if ($kos->update(false) && $pengguna->update(false)) {
                      $response['code'] = 1;
                      $response['message'] = "Status kos saat ini telah batal dan tidak sedang dibooking lagi";
                      $response['data'] = $pemesanan_kos;
                    }else {
                      $response['code'] = 0;
                      $response['message'] = "Status kos gagal diupdate menjadi selesai";
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
     
      $pemesanan_kos = PemesananKos::find()
                      ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                      ->one();

      if (isset($pemesanan_kos)) {
        // code...
        $pemesanan_kos->status= "dalam pemesanan";

        if ($pemesanan_kos->update(false)) {
					$response['code'] = 1;
                    $response['message'] = "Kos saat ini dalam pemesanan";
                    $response['data'] = $pemesanan_kos;

        }else {
          $response['code'] = 0;
  				$response['message'] = "Kos gagal diupdate menjadi dalam pemesanan";
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
          //update rating kos 
          //hitung total rating pemesanan
          $total_rating = PemesananKos::find()
                          ->where(['id_kos' => $pemesanan_kos->id_kos])
                          ->sum('rating');

                          $jumlah_pemesanan = PemesananKos::find()
                          ->where(['id_kos' => $pemesanan_kos->id_kos])
                          ->count();

                          $rating_kos = $total_rating/$jumlah_pemesanan;

                          $kos = Kos::findOne($pemesanan_kos->id_kos);

                          $kos->rating = $rating_kos;

                          if ($kos->save(false)) {
                            $response['message'] = "Rating Total Kos berhasil diupdate. ";
                          }

					$response['code'] = 1;
                    $response['message'] = $response['message']. "Rating dan Review Kos berhasil ditambah";
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

  public function actionCheckUnratingKos($id_pengguna){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      $pemesananKos = PemesananKos::find()
      ->where(['id_pengguna' => $id_pengguna, 'status' => 'Selesai', 'rating' => 0])
      ->one();

      if ($pemesananKos != null) {
        $response['code'] = 1;
        $response['message'] = "Ada review dan rating belum ditambahkan";
        $response['data']['id_pemesanan_kos'] = $pemesananKos->id_pemesanan_kos;
        $response['data']['nama_kos'] = $pemesananKos->kos->nama; 
      }else{
        $response['code'] = 0;
        $response['message'] = "Tidak Ada review dan rating belum ditambahkan";
        $response['data'] = null;
      }
    }
    return $response;
  }

  /*
  UPDATE
  Fungsi untuk update pemesanan kos dari dalam pemesanan menjadi selesai
  */
  public function actionUpdatePemesananKosSelesai() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemesanan_kos= $data['id_pemesanan_kos'];
    
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
                      $response['message'] = "Status kos saat ini telah selesai dan tidak berada dalam pesanan lagi";
                      $response['data'] = $pemesanan_kos;
                    }else {
                      $response['code'] = 0;
                      $response['message'] = "Status kos gagal diupdate menjadi selesai";
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

    /*
    DELETE
    Fungsi untuk menghapus Pemesanan Kos
    */
    public function actionDeletePemesananKos(){
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pemesanan_kos= $data['id_pemesanan_kos'];

        $pemesanan_kos = PemesananKos::find()
                        ->where(['id_pemesanan_kos' => $id_pemesanan_kos])
                        ->one();

                        if (isset($pemesanan_kos)) {
                          if($pemesanan_kos->delete()){
                            //jika data berhasil dihapus
                            $response['code'] = 1;
                            $response['message'] = "Data Pemesanan Kos Berhasil Dihapus";
                            $response['data'] = $pemesanan_kos;
                          }else {
                            // code...
                            $response['code'] = 0;
                            $response['message'] = "Data Pemesanan Kos Gagal Dihapus";
                          }

                        }else {
                            $response['code'] = 0;
                            $response['message'] = "Data tidak ditemukan";
                          }

        }
        return $response;
      }
}
