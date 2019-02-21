<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dt_kontrakan".
 *
 * @property int $id_kontrakan
 * @property string $nama
 * @property string $deskripsi
 * @property string $foto
 * @property string $foto_2
 * @property string $foto_3
 * @property string $waktu_post
 * @property int $id_pemilik
 * @property double $latitude
 * @property double $longitude
 * @property double $altitude
 * @property int $harga
 * @property int $rating
 * @property string $status
 *
 * @property TbPemilik $pemilik
 * @property TbPemesananKontrakan[] $tbPemesananKontrakans
 */
class Kontrakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dt_kontrakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'deskripsi', 'foto', 'id_pemilik', 'latitude', 'longitude', 'altitude', 'harga', 'rating', 'status'], 'required'],
            [['waktu_post'], 'safe'],
            [['id_pemilik', 'harga', 'rating'], 'integer'],
            [['latitude', 'longitude', 'altitude'], 'number'],
            [['status'], 'string'],
            [['nama', 'foto', 'foto_2', 'foto_3'], 'string', 'max' => 30],
            [['deskripsi'], 'string', 'max' => 100],
            [['id_pemilik'], 'exist', 'skipOnError' => true, 'targetClass' => Pemilik::className(), 'targetAttribute' => ['id_pemilik' => 'id_pemilik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kontrakan' => 'Id Kontrakan',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
            'foto' => 'Foto',
            'foto_2' => 'Foto 2',
            'foto_3' => 'Foto 3',
            'waktu_post' => 'Waktu Post',
            'id_pemilik' => 'Id Pemilik',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'harga' => 'Harga',
            'rating' => 'Rating',
            'status' => 'Status',
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
    public function getPemesananKontrakan()
    {
        return $this->hasMany(PemesananKontrakan::className(), ['id_kontrakan' => 'id_kontrakan']);
    }
}
