<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tb_admin".
 *
 * @property int $id_admin
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accesToken
 * @property string $role
 * @property string $foto
 */

class User extends ActiveRecord implements IdentityInterface
{
    const ADMIN = "Admin";
    const SUPER_ADMIN = "SuperAdmin";

    public static function tableName(){
      return 'tb_admin';
    }

    public function rules(){
      return[
        [['username', 'password', 'authKey', 'accessToken', 'role', 'foto'], 'required'],
        [['role'], 'string'],
        [['username'], 'string', 'max' => 30],
        [['password'], 'string', 'max' => 255],
        [['authKey', 'accessToken'], 'string', 'max' => 50],
        [['foto'],'file','extensions' => 'jpeg, jpeg, png', 'maxSize' => 1024*
          1024*1,'on' => 'create'],
      ];
    }

    public function attributeLabels(){
      return[
        'id_admin'   => 'Id Admin',
        'username'   => 'Username',
        'password'   => 'Password',
        'authKey'    => 'Auth Key',
        'accessToken'=> 'Access Token',
        'role'       => 'Role',
        'foto'       => 'Foto Profil',
      ];
    }


    