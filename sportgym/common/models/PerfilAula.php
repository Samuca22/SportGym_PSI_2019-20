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
            [['IDperfil', 'IDaula'], 'required'],
            [['IDperfil', 'IDaula'], 'integer'],
            [['IDperfil', 'IDaula'], 'unique', 'targetAttribute' => ['IDperfil', 'IDaula']],
            [['IDaula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['IDaula' => 'IDaula']],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['IDperfil' => 'IDperfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDperfil' => 'I Dperfil',
            'IDaula' => 'I Daula',
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
