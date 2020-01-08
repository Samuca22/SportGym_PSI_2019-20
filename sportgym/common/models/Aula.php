<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $IDaula
 * @property string $tipo
 * @property string $dtaInicio
 * @property string $duracao
 * @property int|null $IDperfil
 * @property int|null $IDginasio
 *
 * @property Ginasio $iDginasio

 * @property Perfil $iDperfil
 * @property Ginasioaula[] $ginasioaulas
 * @property Ginasio[] $iDginasios
 * @property Perfilaula[] $perfilaulas
 * @property Perfil[] $iDperfils
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'duracao'], 'required'],
            [['duracao'], 'safe'],
            [['tipo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDaula' => 'I Daula',
            'tipo' => 'Tipo',
            'duracao' => 'Duracao',
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
    public function getGinasioaulas()
    {
        return $this->hasMany(Ginasioaula::className(), ['IDaula' => 'IDaula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDginasios()
    {
        return $this->hasMany(Ginasio::className(), ['IDginasio' => 'IDginasio'])->viaTable('ginasioaula', ['IDaula' => 'IDaula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilaulas()
    {
        return $this->hasMany(Perfilaula::className(), ['IDaula' => 'IDaula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfils()
    {
        return $this->hasMany(Perfil::className(), ['IDperfil' => 'IDperfil'])->viaTable('perfilaula', ['IDaula' => 'IDaula']);
    }
}
