<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plano".
 *
 * @property int $IDplano
 * @property string $nome
 * @property int $nutricao
 * @property int $treino
 * @property string|null $descricao
 *
 * @property Perfilplano[] $perfilplanos
 * @property Perfil[] $iDperfils
 */
class Plano extends \yii\db\ActiveRecord
{
    public $tipo;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plano';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['tipo', 'required', 'message' => 'Selecione um tipo de plano'],
            [['nome'/*, 'nutricao', 'treino'*/], 'required', 'message' => 'Introduza um nome para o plano'],
            [['nutricao', 'treino'], 'integer'],
            ['descricao', 'required', 'message' => 'Introduza a descrição do plano'],
            ['tipo', 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 5000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDplano' => 'I Dplano',
            'nome' => 'Nome',
            'nutricao' => 'Nutricao',
            'treino' => 'Treino',
            'descricao' => 'Descrição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilplanos()
    {
        return $this->hasMany(Perfilplano::className(), ['IDplano' => 'IDplano']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfils()
    {
        return $this->hasMany(Perfil::className(), ['IDperfil' => 'IDperfil'])->viaTable('perfilplano', ['IDplano' => 'IDplano']);
    }
}
