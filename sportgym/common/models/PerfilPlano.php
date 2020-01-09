<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfilplano".
 *
 * @property int $IDperfil
 * @property int $IDplano
 * @property string $dtaplano
 *
 * @property Perfil $iDperfil
 * @property Plano $iDplano
 */
class PerfilPlano extends \yii\db\ActiveRecord
{
    public $nSocio;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfilplano';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[/*'IDperfil', */'dtaplano'], 'required', 'message' => 'Introduza a data em que o plano foi atribuido'],
            [['nSocio'], 'required', 'message' => 'Introduza o número de sócio', 'on' => 'create'],
            [['IDplano'], 'required', 'message' => 'Introduza um plano válido'], 
            [['IDperfil', 'IDplano'], 'integer'],
            [['dtaplano'], 'safe'],
            [['IDperfil', 'IDplano'], 'unique', 'targetAttribute' => ['IDperfil', 'IDplano'], 'message' => 'Este plano já se encontra atribuído ao sócio inserid'],
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
            'IDplano' => 'Nome do Plano',
            'dtaplano' => 'Dtaplano',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfil()
    {
        return $this->hasOne(Perfil::className(), ['IDperfil' => 'IDperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDplano()
    {
        return $this->hasOne(Plano::className(), ['IDplano' => 'IDplano']);
    }
}
