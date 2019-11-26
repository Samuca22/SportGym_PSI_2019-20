<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PerfilPlano;

/**
 * PerfilPlanoSearch represents the model behind the search form of `common\models\PerfilPlano`.
 */
class PerfilPlanoSearch extends PerfilPlano
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDperfil', 'IDplano'], 'integer'],
            [['dtaplano'], 'safe'],
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
        $query = PerfilPlano::find();

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
            'IDperfil' => $this->IDperfil,
            'IDplano' => $this->IDplano,
            'dtaplano' => $this->dtaplano,
        ]);

        return $dataProvider;
    }
}
