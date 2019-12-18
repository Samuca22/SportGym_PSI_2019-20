<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PerfilAula;

/**
 * PerfilAulaSearch represents the model behind the search form of `common\models\PerfilAula`.
 */
class PerfilAulaSearch extends PerfilAula
{
    public $nSocio;
    public $tipo;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nSocio'], 'integer'],
            ['nSocio', 'safe'],
            [['tipo'], 'integer'],
            ['tipo', 'safe'],

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
        $query = PerfilAula::find();
        $query->leftJoin('perfil', 'perfil.IDperfil=perfilaula.IDperfil');
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
        $query->andFilterWhere([
            'perfil.nSocio' => $this->nSocio,
             'aula.tipo' => $this->tipo,
        ]);

        return $dataProvider;
    }
}
