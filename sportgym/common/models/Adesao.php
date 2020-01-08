<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adesao".
 *
 * @property int $IDadesao
 * @property string $dtaInicio
 * @property int|null $IDginasio
 *
 * @property Ginasio $iDginasio
 */
class Adesao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'adesao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dtaInicio'], 'required'],
            [['dtaInicio', 'dtaFim'], 'safe'],
            [['IDginasio'], 'required', 'message' => 'Por favor selecione um ginásio'],
            [['IDginasio'], 'integer'],
            [['IDginasio'], 'exist', 'skipOnError' => true, 'targetClass' => Ginasio::className(), 'targetAttribute' => ['IDginasio' => 'IDginasio']],
            [['IDperfil'], 'integer'],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['IDperfil' => 'IDperfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDadesao' => 'I Dadesao',
            'dtaInicio' => 'Dta Inicio',
            'dtaFim' => 'Dta Fim',
            'IDginasio' => 'Ginásio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDginasio()
    {
        return $this->hasOne(Ginasio::className(), ['IDginasio' => 'IDginasio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfil()
    {
        return $this->hasOne(Adesao::className(), ['IDperfil' => 'IDperfil']);
    }
}
