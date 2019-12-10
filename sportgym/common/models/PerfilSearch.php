<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Perfil;

/**
 * PerfilSearch represents the model behind the search form of `common\models\Perfil`.
 */
class PerfilSearch extends Perfil
{
    public $global;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDperfil', 'nSocio'], 'integer'],
            [['global', 'foto', 'primeiroNome', 'apelido', 'genero', 'telefone', 'dtaNascimento', 'rua', 'localidade', 'cp', 'nif'], 'safe'],
            [['peso'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'global' => 'Primeiro Nome ou NIF  ou  NºSócio',
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
        $query = Perfil::find();

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
        /*$query->andFilterWhere([
            'IDperfil' => $this->IDperfil,
            'nSocio' => $this->nSocio,
            'dtaNascimento' => $this->dtaNascimento,
            'peso' => $this->peso,
        ]);*/

        $query->orFilterWhere(['like', 'primeiroNome', $this->global])
            ->orFilterWhere(['like', 'nSocio', $this->global])
            //->andFilterWhere(['like', 'foto', $this->foto])
            //->andFilterWhere(['like', 'apelido', $this->apelido])
            //->andFilterWhere(['like', 'genero', $this->genero])
            //->andFilterWhere(['like', 'telefone', $this->telefone])
            //->andFilterWhere(['like', 'rua', $this->rua])
            //->andFilterWhere(['like', 'localidade', $this->localidade])
            //->andFilterWhere(['like', 'cp', $this->cp])
            ->orFilterWhere(['like', 'nif', $this->global]);

        return $dataProvider;
    }
}
