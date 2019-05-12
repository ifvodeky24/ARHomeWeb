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
	Fungsi untuk mendapatkan detail data pemilik filter by id_pemilik
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

			$email = $data['email'];
			$password = $data['password'];

			// pengecekan username dan password
			// select * from tb_pemilik where username = '' And password = ''

			$pemilik = Pemilik::find()
						->where(['email' => $email])
						->andWhere(['password' =>$password])
						->one();

			if (isset($pemilik)){
        $response['code'] = 1;
				$response['message'] = "Login berhasil";
				$response['data'] = $pemilik;
			} else {
        $response['code'] = 0;
				$response['message'] = "Login gagal, email atau password salah";
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
      $email = $data['email'];
      $nama_lengkap = $data['nama_lengkap'];
      $no_kk = $data['no_kk'];
      $alamat = $data['alamat'];
      $foto = $data['foto'];
      $no_handphone = $data['no_handphone'];

      // lakukan insert data
      $pemilik = new Pemilik();
      $pemilik->username= $username;
      $pemilik->password= $password;
      $pemilik->email= $email;
      $pemilik->nama_lengkap= $nama_lengkap;
      $pemilik->no_kk= $no_kk;
      $pemilik->alamat= $alamat;
      $pemilik->foto = $foto;
      $pemilik->no_handphone= $no_handphone;

      if($pemilik->save(false)){
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
      // $password = $data['password'];
      $email = $data['email'];
      $nama_lengkap = $data['nama_lengkap'];
      $no_kk = $data['no_kk'];
      $alamat = $data['alamat'];
      // $foto = $data['foto'];
      $no_handphone = $data['no_handphone'];

      $pemilik = Pemilik::find()
                      ->where(['id_pemilik' => $id_pemilik])
                      ->one();

      if (isset($pemilik)) {
        // code...
        $pemilik->username= $username;
        // $pemilik->password= $password;
        $pemilik->email= $email;
        $pemilik->nama_lengkap= $nama_lengkap;
        $pemilik->no_kk= $no_kk;
        $pemilik->alamat= $alamat;
        // $pemilik->foto= $foto;
        $pemilik->no_handphone= $no_handphone;

        if ($pemilik->update(false)) {
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
  UPDATE
  Fungsi untuk upload Foto Pemilik
  */
  public function actionUploadFotoPemilik() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemilik= $data['id_pemilik'];
      $foto = $data['foto'];
      
      $pemilik = Pemilik::find()
                      ->where(['id_pemilik' => $id_pemilik])
                      ->one();

      if (isset($pemilik)) {
        // code...
        $pemilik->foto= $foto;
      
        if ($pemilik->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
          $response['message'] = "Upload Foto berhasil";
          $response['data'] = $pemilik;
        }else {
          $response['code'] = 0;
          $response['message'] = "Upload Foto gagal";
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
  Fungsi untuk update password Pemilik
  */
  public function actionUpdatePasswordPemilik() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pemilik= $data['id_pemilik'];
      $password = $data['password'];
      
      $pemilik = Pemilik::find()
                      ->where(['id_pemilik' => $id_pemilik])
                      ->one();

      if (isset($pemilik)) {
        // code...
        $pemilik->password= $password;
      
        if ($pemilik->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
          $response['message'] = "Password berhasil diubah";
          $response['data'] = $pemilik;
        }else {
          $response['code'] = 0;
          $response['message'] = "Password gagal diubah";
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
    public function actionDeletePemilik(){
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
