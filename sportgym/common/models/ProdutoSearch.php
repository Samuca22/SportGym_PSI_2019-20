<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `common\models\Produto`.
 */
class ProdutoSearch extends Produto
{

    public $global;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDproduto', 'estado', 'IDlinhaVenda'], 'integer'],
            [['nome', 'fotoProduto', 'descricao', 'global'], 'safe'],
            [['precoProduto'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'global' => 'Nome ou Estado', 
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
        $query = Produto::find();

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
        /*
        $query->andFilterWhere([
            'IDproduto' => $this->IDproduto,
            'estado' => $this->estado,
            'precoProduto' => $this->precoProduto,
            'IDlinhaVenda' => $this->IDlinhaVenda,
        ]);*/

        $query->orFilterWhere(['like', 'nome', $this->global])
            ->orFilterWhere(['like', 'estado', $this->global]);
            //->andFilterWhere(['like', 'fotoProduto', $this->fotoProduto])
            //->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
