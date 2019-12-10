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
<<<<<<< HEAD
<<<<<<< HEAD
 * @property Perfil $iDperfil
=======
>>>>>>> Samuel-BackOffice-GestaoPessoas
=======
>>>>>>> 01ecfc65fd6ad76efe51d54fca8ec2b0ef4169f1
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
            [['tipo', 'dtaInicio', 'duracao'], 'required'],
            [['dtaInicio', 'duracao'], 'safe'],
            [['IDperfil', 'IDginasio'], 'integer'],
            [['tipo'], 'string', 'max' => 20],
            [['IDginasio'], 'exist', 'skipOnError' => true, 'targetClass' => Ginasio::className(), 'targetAttribute' => ['IDginasio' => 'IDginasio']],
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
            'dtaInicio' => 'Dta Inicio',
            'duracao' => 'Duracao',
            'IDperfil' => 'I Dperfil',
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

    /**
     * @return \yii\db\ActiveQuery
     */
<<<<<<< HEAD
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
=======
>>>>>>> 01ecfc65fd6ad76efe51d54fca8ec2b0ef4169f1
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
