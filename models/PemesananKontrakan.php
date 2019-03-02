<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pemesanan_kontrakan".
 *
 * @property int $id_pemesanan_kontrakan
 * @property int $id_pengguna
 * @property int $id_kontrakan
 * @property string $status
 * @property string $review
 * @property int $rating
 *
 * @property TbPengguna $pengguna
 * @property DtKontrakan $kontrakan
 */
class PemesananKontrakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pemesanan_kontrakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna', 'id_kontrakan', 'status', 'review', 'rating'], 'required'],
            [['id_pengguna', 'id_kontrakan', 'rating'], 'integer'],
            [['status'], 'string'],
            [['review'], 'string', 'max' => 200],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => Pengguna::className(), 'targetAttribute' => ['id_pengguna' => 'id_pengguna']],
            [['id_kontrakan'], 'exist', 'skipOnError' => true, 'targetClass' => Kontrakan::className(), 'targetAttribute' => ['id_kontrakan' => 'id_kontrakan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemesanan_kontrakan.' => 'Id Pemesanan Kontrakan',
            'pengguna' => 'Id Pengguna',
            'id_kontrakan' => 'Id Kontrakan',
            'status' => 'Status',
            'review' => 'Review',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengguna()
    {
        return $this->hasOne(Pengguna::className(), ['id_pengguna' => 'id_pengguna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKontrakan()
    {
        return $this->hasOne(Kontrakan::className(), ['id_kontrakan' => 'id_kontrakan']);
    }
}
