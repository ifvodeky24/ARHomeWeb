<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kos;

/**
 * KosSearch represents the model behind the search form of `app\models\Kos`.
 */
class KosSearch extends Kos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kos', 'id_pemilik', 'harga', 'stok_kamar'], 'integer'],
            [['nama', 'deskripsi', 'foto', 'waktu_post', 'rating', 'status', 'jenis_kos'], 'safe'],
            [['latitude', 'longitude', 'altitude'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kos' => $this->id_kos,
            'waktu_post' => $this->waktu_post,
            'id_pemilik' => $this->id_pemilik,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'harga' => $this->harga,
            'stok_kamar' => $this->stok_kamar,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'jenis_kos', $this->jenis_kos]);

        return $dataProvider;
    }
}
