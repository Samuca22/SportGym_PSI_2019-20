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
            [['IDplano', 'nutricao', 'treino'], 'integer'],
            [['nome', 'descricao'], 'safe'],
=======
            [['nome'], 'safe'],
>>>>>>> 01ecfc65fd6ad76efe51d54fca8ec2b0ef4169f1
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
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

<<<<<<< HEAD
        // grid filtering conditions
        $query->andFilterWhere([
            'IDplano' => $this->IDplano,
            'nutricao' => $this->nutricao,
            'treino' => $this->treino,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);
=======
        // grid filtering conditionsad
        $query->andFilterWhere(['like', 'nome', $this->nome]);
>>>>>>> 01ecfc65fd6ad76efe51d54fca8ec2b0ef4169f1

        return $dataProvider;
    }
}
