<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\Admin;
use yii\rest\Controller;
use yii\web\Response;

/**
 *
 */
class AdminController extends Controller
{

  /*
	GET
	Fungsi untuk mendapatkan semua data-data admin
	*/
	public function actionGetAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){

			// select * from tb_admin
			$admin = Admin::find()->all();

			$response['master'] = $admin;
		}

		return $response;
	}

  /*
	GET
	Fungsi untuk mendapatkan data admin filter by id_admin
	*/
  public function actionById ($id_admin){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isGet) {
      // code...
      $admin = Admin::find()
                      ->where(['id_admin' => $id_admin])
                      ->all();

                      $response['master'] = $admin;
    }

    return $response;
  }

  /*
	POST
	Fungsi untuk login sebagai admin
	*/
	public function actionLogin(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost){
			$data = Yii::$app->request->Post();

			$username = $data['username'];
			$password = $data['password'];

			// pengecekan username dan password
			// select * from tb_admin where username = '' And password = ''

			$admin = Admin::find()
						->where(['username' => $username])
						->andWhere(['password' =>$password])
						->one();

			if (isset($admin)){
        $response['code'] = 1;
				$response['message'] = "Login berhasil";
				$response['data'] = $admin;
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
  Fungsi untuk tambah admin
  */
  public function actionTambahAdmin(){
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();
      // code...
      $username = $data['username'];
      $password = $data['password'];

      // lakukan insert data
      $admin = new Admin();
      $admin->username= $username;
      $admin->password= $password;

      if($admin->save()){
        //jika data berhasil disimpan
        $response['code'] = 1;
				$response['message'] = "Registrasi berhasil";
				$response['data'] = $admin;
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
  Fungsi untuk update data Admin
  */
  public function actionUpdateAdmin() {
    Yii::$app->response->format = Response::FORMAT_JSON;

    $response = null;

    if (Yii::$app->request->isPost) {
      $data = Yii::$app->request->Post();

      $id_admin= $data['id_admin'];
      $username = $data['username'];
      $password = $data['password'];

      $admin = Admin::find()
                      ->where(['id_admin' => $id_admin])
                      ->one();

      if (isset($admin)) {
        // code...
        $admin->username= $username;
        $admin->password= $password;

        if ($admin->update()) {
          // jika data berhasil diupdate
          $response['code'] = 1;
  				$response['message'] = "Update berhasil";
  				$response['data'] = $admin;
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
  Fungsi untuk delete data admin
  */
    public function actionDelete(){
      Yii::$app->response->format = Response::FORMAT_JSON;

      $response = null;

      if (Yii::$app->request->isPost) {
        $data = Yii::$app->request->Post();

        $id_admin= $data['id_admin'];

        $admin = Admin::find()
                        ->where(['id_admin' => $id_admin])
                        ->one();

                        if (isset($admin)) {
                          if($admin->delete()){
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
