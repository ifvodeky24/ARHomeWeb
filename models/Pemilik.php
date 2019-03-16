<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pemilik".
 *
 * @property int $id_pemilik
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $nama_lengkap
 * @property int $no_kk
 * @property string $alamat
 * @property string $foto
 * @property string $no_handphone
 *
 * @property Kontrakan[] $Kontrakan
 * @property Kos[] $Kos
 */
class Pemilik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pemilik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'nama_lengkap', 'alamat', 'foto', 'no_handphone'], 'required'],
            [['no_kk'], 'integer'],
            [['username', 'email', 'alamat', 'foto'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 255],
            [['nama_lengkap'], 'string', 'max' => 40],
            [['no_handphone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemilik' => 'Id Pemilik',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'nama_lengkap' => 'Nama Lengkap',
            'no_kk' => 'No Kk',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'no_handphone' => 'No Handphone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontrakan()
    {
        return $this->hasMany(Kontrakan::className(), ['id_pemilik' => 'id_pemilik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKos()
    {
        return $this->hasMany(Kos::className(), ['id_pemilik' => 'id_pemilik']);
    }
}
