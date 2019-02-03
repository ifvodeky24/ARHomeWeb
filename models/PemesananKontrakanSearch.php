<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemesananKontrakan;

/**
 * PemesananKontrakanSearch represents the model behind the search form of `app\models\PemesananKontrakan`.
 */
class PemesananKontrakanSearch extends PemesananKontrakan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemesanan_kontrakan', 'id_pengguna', 'id_kontrakan'], 'integer'],
            [['status', 'review', 'rating'], 'safe'],
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
        $query = PemesananKontrakan::find();

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
            'id_pemesanan_kontrakan' => $this->id_pemesanan_kontrakan,
            'id_pengguna' => $this->id_pengguna,
            'id_kontrakan' => $this->id_kontrakan,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'review', $this->review])
            ->andFilterWhere(['like', 'rating', $this->rating]);

        return $dataProvider;
    }
}
