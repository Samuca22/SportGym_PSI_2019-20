<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Plano;

/**
 * PlanoSearch represents the model behind the search form of `common\models\Plano`.
 */
class PlanoSearch extends Plano
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['nome'], 'safe'],
=======
            [['IDplano', 'nutricao', 'treino'], 'integer'],
            [['nome', 'descricao'], 'safe'],
>>>>>>> 87693c9d6a07f82fd2f44845ccc33f2ece3c0b84
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
        $query = Plano::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
<<<<<<< HEAD
=======
        $query->andFilterWhere([
            'IDplano' => $this->IDplano,
            'nutricao' => $this->nutricao,
            'treino' => $this->treino,
        ]);
>>>>>>> 87693c9d6a07f82fd2f44845ccc33f2ece3c0b84

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
