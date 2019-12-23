<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Venda;

/**
 * VendaSearch represents the model behind the search form of `common\models\Venda`.
 */
class VendaSearch extends Venda
{
    public $global;
    public $globalFrontend;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDvenda', 'estado', 'IDperfil'], 'integer'],
            [['dataVenda', 'global'], 'safe'],
            [['total'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'global' => 'Data da Venda ou Primeiro Nome',
            'globalFrontend' => '',

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
        $query = Venda::find()->orderBy(['dataVenda' => SORT_DESC]);
        $query->leftJoin('perfil', 'perfil.IDperfil=venda.IDperfil');

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
        $query->orFilterWhere(['like', 'dataVenda', $this->global])
            ->orFilterWhere(['like', 'perfil.primeiroNome', $this->global])
            ->orFilterWhere(['like', 'total', $this->globalFrontend])
        ->orFilterWhere(['like', 'dataVenda', $this->globalFrontend])
        ->orFilterWhere(['like', 'estado', $this->globalFrontend]);
        //'IDvenda' => $this->IDvenda,
        //'estado' => $this->estado,
        //'dataVenda' => $this->dataVenda,
        //'total' => $this->total,
        //'IDperfil' => $this->IDperfil,
        //]);

        return $dataProvider;
    }
}
