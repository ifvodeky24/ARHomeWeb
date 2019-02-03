<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Kontrakan;
use yii\rest\Controller;
use yii\web\Response;


class KontrakanController extends Controller
{
  /*
	GET
	Fungsi untuk mendapatkan semua data-data kontrakan
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_kontrakan
			$kontrakan = Kontrakan::find()->all();

			$response['master'] = $kontrakan;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan data kontrakan filter by id_kontrakan
	*/

  public function actionById ($id_kontrakan){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $kontrakan = Kontrakan::find()
                      ->where(['id_kos' => $id_kontrakan])
                      ->all();

                      $response['master'] = $kontrakan;
    }

    return $response;
  }

  /*
  CREATE
  Fungsi untuk menambah kontrakan
  */

  public function actionTambahKontrakan(){
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

      // lakukan insert data
      $kontrakan = new Kontrakan();
      $kontrakan->nama= $nama;
      $kontrakan->deskripsi= $deskripsi;
      $kontrakan->foto= $foto;
      $kontrakan->waktu_post= $waktu_post;
      $kontrakan->id_pemilik= $id_pemilik;
      $kontrakan->latitude= $latitude;
      $kontrakan->longitude= $longitude;
      $kontrakan->altitude= $altitude;
      $kontrakan->harga= $harga;
      $kontrakan->rating= $rating;
      $kontrakan->status= $status;

      if($kontrakan->save()){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Tambah Kontrakan berhasil";
				$response['data'] = $kontrakan;
      }else{
        $response['code'] = 0;
				$response['message'] = "Tambah Kontrakan gagal";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data kontrakan
  */

  public function actionUpdateKontrakan() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_kontrakan= $data['id_kontrakan'];
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

      $kontrakan = Kontrakan::find()
                      ->where(['id_kontrakan' => $id_kontrakan])
                      ->one();

      if (isset($kontrakan)) {
        // code...
        $kontrakan->nama= $nama;
        $kontrakan->deskripsi= $deskripsi;
        $kontrakan->foto= $foto;
        $kontrakan->waktu_post= $waktu_post;
        $kontrakan->id_pemilik= $id_pemilik;
        $kontrakan->latitude= $latitude;
        $kontrakan->longitude= $longitude;
        $kontrakan->altitude= $altitude;
        $kontrakan->harga= $harga;
        $kontrakan->rating= $rating;
        $kontrakan->status= $status;

        if ($kontrakan->update()) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $kontrakan;
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
  Fungsi untuk delete kontrakan
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
