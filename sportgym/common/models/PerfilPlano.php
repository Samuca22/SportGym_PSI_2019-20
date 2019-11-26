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
            [['IDperfil', 'IDplano', 'dtaplano'], 'required'],
            [['IDperfil', 'IDplano'], 'integer'],
            [['dtaplano'], 'safe'],
            [['IDperfil', 'IDplano'], 'unique', 'targetAttribute' => ['IDperfil', 'IDplano']],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['IDperfil' => 'IDperfil']],
            [['IDplano'], 'exist', 'skipOnError' => true, 'targetClass' => Plano::className(), 'targetAttribute' => ['IDplano' => 'IDplano']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDperfil' => 'I Dperfil',
            'IDplano' => 'I Dplano',
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
