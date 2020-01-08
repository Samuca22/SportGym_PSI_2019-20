<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plano".
 *
 * @property int $IDplano
 * @property string $nome
 * @property int $tipo
 * @property string|null $descricao
 *
 * @property Perfilplano[] $perfilplanos
 * @property Perfil[] $iDperfils
 */
class Plano extends \yii\db\ActiveRecord
{
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
            [['nome'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 5000],
            [['tipo'], 'boolean'],
            
            [['nome'], 'required', 'message' => 'Introduza um nome para o plano'],
            [['descricao'], 'required', 'message' => 'Introduza a descrição do plano'],
            [['tipo'], 'required', 'message' => 'Selecione o tipo de plano'],
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
            'tipo' => 'Tipo de Plano',

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

    public function atribuirNomeFromBack()
    {
        $this->nome = 'sportgym' . $this->IDplano . '_' . $this->nome;
        $this->save();
    }

    public function verificarAtribuicaoPlano()
    {
        $planoAssociado = PerfilPlano::find()->where(['IDplano' => $this->IDplano])->all();

        if($planoAssociado == null){
            return true;
        } else {
            return false;
        }
    }
}
