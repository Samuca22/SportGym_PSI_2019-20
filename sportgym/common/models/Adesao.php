<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adesao".
 *
 * @property int $IDadesao
 * @property string $dtaInicio
 * @property string|null $dtaFim
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
            [['IDginasio'], 'integer'],
            [['IDginasio'], 'exist', 'skipOnError' => true, 'targetClass' => Ginasio::className(), 'targetAttribute' => ['IDginasio' => 'IDginasio']],
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
            'IDginasio' => 'I Dginasio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDginasio()
    {
        return $this->hasOne(Ginasio::className(), ['IDginasio' => 'IDginasio']);
    }
}
