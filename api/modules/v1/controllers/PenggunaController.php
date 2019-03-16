<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Pengguna;
use yii\rest\Controller;
use yii\web\Response;


class PenggunaController extends Controller
{

	/*
	GET
	Fungsi untuk mendapatkan semua data-data pengguna
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_pemilik
			$pengguna = Pengguna::find()->all();

			$response['master'] = $pengguna;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan data pengguna filter by id_pengguna
	*/
  public function actionById ($id_pengguna){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $pengguna = Pengguna::find()
                      ->where(['id_pengguna' => $id_pengguna])
                      ->one();

                      $response['master'] = $pengguna;
    }

    return $response;
  }

	/*
	POST
	Fungsi untuk login sebagai pengguna
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

			$pengguna = Pengguna::find()
						->where(['username' => $username])
						->andWhere(['password' =>$password])
						->one();

			if (isset($pengguna)){
        $response['code'] = 1;
				$response['message'] = "Login berhasil";
				$response['data'] = $pengguna;
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
  Fungsi untuk register sebagai Pengguna
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
      $alamat = $data['alamat'];
      $foto = $data['foto'];
      $no_handphone = $data['no_handphone'];

      // lakukan insert data

      $pengguna = new Pengguna();
      $pengguna->username= $username;
      $pengguna->password= $password;
      $pengguna->email= $email;
      $pengguna->nama_lengkap= $nama_lengkap;
      $pengguna->alamat= $alamat;
      $pengguna->foto= $foto;
      $pengguna->no_handphone= $no_handphone;

      if($pengguna->save(false)){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Registrasi berhasil";
				$response['data'] = $pengguna;
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
  Fungsi untuk update data Pengguna
  */
  public function actionUpdatePengguna() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pengguna= $data['id_pengguna'];
      $username = $data['username'];
      $password = $data['password'];
      $email = $data['email'];
      $nama_lengkap = $data['nama_lengkap'];
      $alamat = $data['alamat'];
      $foto = $data['foto'];
      $no_handphone = $data['no_handphone'];

      $pengguna = Pengguna::find()
                      ->where(['id_pengguna' => $id_pengguna])
                      ->one();

      if (isset($pengguna)) {
        // code...
        $pengguna->username= $username;
        $pengguna->password= $password;
        $pengguna->email= $email;
        $pengguna->nama_lengkap= $nama_lengkap;
        $pengguna->alamat= $alamat;
        $pengguna->foto= $foto;
        $pengguna->no_handphone= $no_handphone;

        if ($pengguna->update(false)) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $pengguna;
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
Fungsi untuk delete sebagai Pengguna
*/
  public function actionDelete(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_pengguna= $data['id_pengguna'];

      $pengguna = Pengguna::find()
                      ->where(['id_pengguna' => $id_pengguna])
                      ->one();

                      if (isset($pengguna)) {
                        if($pengguna->delete()){
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
