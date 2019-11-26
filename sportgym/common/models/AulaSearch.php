<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Aula;

/**
 * AulaSearch represents the model behind the search form of `common\models\Aula`.
 */
class AulaSearch extends Aula
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDaula', 'IDperfil', 'IDginasio'], 'integer'],
            [['tipo', 'dtaInicio', 'duracao'], 'safe'],
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
        $query = Aula::find();

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
            'IDaula' => $this->IDaula,
            'dtaInicio' => $this->dtaInicio,
            'duracao' => $this->duracao,
            'IDperfil' => $this->IDperfil,
            'IDginasio' => $this->IDginasio,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
