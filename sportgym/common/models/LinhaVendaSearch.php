<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LinhaVenda;

/**
 * LinhaVendaSearch represents the model behind the search form of `common\models\LinhaVenda`.
 */
class LinhaVendaSearch extends LinhaVenda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDlinhaVenda', 'quantidade', 'IDvenda'], 'integer'],
            [['subTotal'], 'number'],
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
        $query = LinhaVenda::find();

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
            'IDlinhaVenda' => $this->IDlinhaVenda,
            'quantidade' => $this->quantidade,
            'subTotal' => $this->subTotal,
            'IDvenda' => $this->IDvenda,
        ]);

        return $dataProvider;
    }
}
