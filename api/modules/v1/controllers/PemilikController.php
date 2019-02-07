<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Pemilik;
use yii\rest\Controller;
use yii\web\Response;

class PemilikController extends Controller
{

	/*
	GET
	Fungsi untuk mendapatkan semua data-data pemilik kontrakan/kos
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_pemilik
			$pemilik = Pemilik::find()->all();

			$response['master'] = $pemilik;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan data pemilik filter by id_pemilik
	*/
  public function actionById ($id_pemilik){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $pemilik = Pemilik::find()
                      ->where(['id_pemilik' => $id_pemilik])
                      ->all();

                      $response['master'] = $pemilik;
    }

    return $response;
  }

	/*
	POST
	Fungsi untuk login sebagai pemilik
	*/
	public function actionLogin(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost){
			$data = Yii::$app->request->Post();

      // echo "<pre>";
      // var_dump($data);
      // exit();

			$username = $data['username'];
			$password = $data['password'];

			// pengecekan username dan password
			// select * from tb_pemilik where username = '' And password = ''

			$pemilik = Pemilik::find()
						->where(['username' => $username])
						->andWhere(['password' =>$password])
						->one();

			if (isset($pemilik)){
        $response['code'] = 1;
				$response['message'] = "Login berhasil";
				$response['data'] = $pemilik;
			} else {
        $response['code'] = 0;
				$response['message'] = "Login gagal, username password salah";
				$response['data'] = null;
			}
		}

		return $response;
	}

  /*
  CREATE
  Fungsi untuk register sebagai pemilik
  */
  public function actionRegister(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $username = $data['username'];
      $password = $data['password'];
      $nama_lengkap = $data['nama_lengkap'];
      $alamat = $data['alamat'];
      $foto = $data['foto'];
      $no_handphone = $data['no_handphone'];

      // lakukan insert data

      $pemilik = new Pemilik();
      $pemilik->username= $username;
      $pemilik->password= $password;
      $pemilik->nama_lengkap= $nama_lengkap;
      $pemilik->alamat= $alamat;
      $pemilik->foto= $foto;
      $pemilik->no_handphone= $no_handphone;

      if($pemilik->save()){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Registrasi berhasil";
				$response['data'] = $pemilik;
      }else{
        $response['code'] = 0;
				$response['message'] = "Registrasi gagal";
				$response['data'] = null;
      }
    }
    	return $response;
  }

  /*
  UPDATE
  Fungsi untuk update data Pemilik
  */
  public function actionUpdatePemilik() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemilik= $data['id_pemilik'];
      $username = $data['username'];
      $password = $data['password'];
      $nama_lengkap = $data['nama_lengkap'];
      $alamat = $data['alamat'];
      $foto = $data['foto'];
      $no_handphone = $data['no_handphone'];

      $pemilik = Pemilik::find()
                      ->where(['id_pemilik' => $id_pemilik])
                      ->one();

      if (isset($pemilik)) {
        // code...
        $pemilik->username= $username;
        $pemilik->password= $password;
        $pemilik->nama_lengkap= $nama_lengkap;
        $pemilik->alamat= $alamat;
        $pemilik->foto= $foto;
        $pemilik->no_handphone= $no_handphone;

        if ($pemilik->update()) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $pemilik;
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
  Fungsi untuk delete data pemilik
  */
    public function actionDelete(){
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_pemilik= $data['id_pemilik'];

        $pemilik = Pemilik::find()
                        ->where(['id_pemilik' => $id_pemilik])
                        ->one();

                        if (isset($pemilik)) {
                          if($pemilik->delete()){
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
