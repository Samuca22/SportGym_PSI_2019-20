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
<<<<<<< HEAD
    public $tipo;
=======
>>>>>>> GoncaloAula
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nSocio'], 'integer'],
            ['nSocio', 'safe'],
<<<<<<< HEAD
            [['tipo'], 'integer'],
            ['tipo', 'safe'],
=======
>>>>>>> GoncaloAula
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
<<<<<<< HEAD
=======

>>>>>>> GoncaloAula
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
<<<<<<< HEAD
             'aula.tipo' => $this->tipo,
=======
>>>>>>> GoncaloAula
        ]);

        return $dataProvider;
    }
}
