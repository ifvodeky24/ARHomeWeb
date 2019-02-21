<?php

namespace app\models;

use Yii;

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
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accesToken', 'role', 'foto'], 'required'],
            [['role'], 'string'],
            [['username'], 'string', 'max' => 30],
            [['password', 'foto'], 'string', 'max' => 255],
            [['authKey', 'accesToken'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_admin' => 'Id Admin',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accesToken' => 'Acces Token',
            'role' => 'Role',
            'foto' => 'Foto',
        ];
    }
}
