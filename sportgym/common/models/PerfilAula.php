<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfilaula".
 *
 * @property int $IDperfil
 * @property int $IDaula
 *
 * @property Aula $iDaula
 * @property Perfil $iDperfil
 */
class PerfilAula extends \yii\db\ActiveRecord

{
    public $nSocio;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfilaula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [[/*'IDperfil', 'IDaula', */'nSocio',], 'required', 'message' => 'Introduza o número de sócio'],
            [['IDaula'], 'required', 'message' => 'Selecione uma aula'],
            [['IDperfil', 'IDaula'], 'integer'],
            [['IDperfil', 'IDaula'], 'unique', 'targetAttribute' => ['IDperfil', 'IDaula'], 'message' => 'O aluno já se encontra inscrito na aula selecionada'],
            [['IDaula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['IDaula' => 'IDaula']],
            [['nSocio'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['nSocio' => 'nSocio'], 'message' => 'Sócio não existe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nSocio' => 'Número de Sócio',
            'IDperfil' => 'I Dperfil',
            'IDaula' => 'Nome da Aula',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDaula()
    {
        return $this->hasOne(Aula::className(), ['IDaula' => 'IDaula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfil()
    {
        return $this->hasOne(Perfil::className(), ['IDperfil' => 'IDperfil']);
    }
}
