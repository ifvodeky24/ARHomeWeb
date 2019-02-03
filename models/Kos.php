<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dt_kos".
 *
 * @property int $id_kos
 * @property string $nama
 * @property string $deskripsi
 * @property string $foto
 * @property string $waktu_post
 * @property int $id_pemilik
 * @property double $latitude
 * @property double $longitude
 * @property double $altitude
 * @property int $harga
 * @property string $rating
 * @property string $status
 * @property int $stok_kamar
 * @property string $jenis_kos
 *
 * @property TbPemilik $pemilik
 * @property TbPemesananKos[] $tbPemesananKos
 */
class Kos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dt_kos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'deskripsi', 'foto', 'waktu_post', 'id_pemilik', 'latitude', 'longitude', 'altitude', 'harga', 'rating', 'status', 'stok_kamar', 'jenis_kos'], 'required'],
            [['waktu_post'], 'safe'],
            [['id_pemilik', 'harga', 'stok_kamar'], 'integer'],
            [['latitude', 'longitude', 'altitude'], 'number'],
            [['status', 'jenis_kos'], 'string'],
            [['nama', 'foto'], 'string', 'max' => 30],
            [['deskripsi'], 'string', 'max' => 100],
            [['rating'], 'string', 'max' => 20],
            [['id_pemilik'], 'exist', 'skipOnError' => true, 'targetClass' => Pemilik::className(), 'targetAttribute' => ['id_pemilik' => 'id_pemilik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kos' => 'Id Kos',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
            'foto' => 'Foto',
            'waktu_post' => 'Waktu Post',
            'id_pemilik' => 'Id Pemilik',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'harga' => 'Harga',
            'rating' => 'Rating',
            'status' => 'Status',
            'stok_kamar' => 'Stok Kamar',
            'jenis_kos' => 'Jenis Kos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemilik()
    {
      return $this->hasOne(Pemilik::className(), ['id_pemilik' => 'id_pemilik']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbPemesananKos()
    {
        return $this->hasMany(TbPemesananKos::className(), ['id_kos' => 'id_kos']);
    }
}
