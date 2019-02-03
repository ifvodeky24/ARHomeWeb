<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pemesanan_kos".
 *
 * @property int $id_pemesanan_kos
 * @property int $id_kos
 * @property int $id_pengguna
 * @property string $status
 * @property string $review
 * @property string $rating
 *
 * @property DtKos $kos
 * @property TbPengguna $pengguna
 */
class PemesananKos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pemesanan_kos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kos', 'id_pengguna', 'status', 'review', 'rating'], 'required'],
            [['id_kos', 'id_pengguna'], 'integer'],
            [['status'], 'string'],
            [['review', 'rating'], 'string', 'max' => 30],
            [['id_kos'], 'exist', 'skipOnError' => true, 'targetClass' => Kos::className(), 'targetAttribute' => ['id_kos' => 'id_kos']],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::className(), 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemesanan_kos' => 'Id Pemesanan Kos',
            'id_kos' => 'Id Kos',
            'id_pengguna' => 'Id Pengguna',
            'status' => 'Status',
            'review' => 'Review',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKos()
    {
        return $this->hasOne(Kos::className(), ['id_kos' => 'id_kos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id_pengguna' => 'id_pengguna']);
    }
}
