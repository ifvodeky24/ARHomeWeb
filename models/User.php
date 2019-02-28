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


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // mencari user berdasarkan ID dan yg dicari hanya 1
        $user = User::findOne($id);

        if (count($user)) {
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      // mencari user berdasarkan accesToken dan yang dicari hanya 1
      $user = User::find()->where(['accessToken' => $token])->one();

      if (count($user)) {
          return new static($user);
      }

      return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      // mencari user berdasarkan username dan yang dicari haya 1
        $user = User::find()->where(['username' => $username])->one();

        if (count($user)) {
            return new static($user);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_admin;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
