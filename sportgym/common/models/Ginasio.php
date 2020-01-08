<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ginasio".
 *
 * @property int $IDginasio
 * @property string $rua
 * @property string $localidade
 * @property string $cp
 * @property string $telefone
 * @property string $email
 *
 * @property Adesao[] $adesaos
 * @property Aula[] $aulas
 * @property Ginasioaula[] $ginasioaulas
 * @property Aula[] $iDaulas
 */
class Ginasio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ginasio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rua', 'localidade', 'cp', 'telefone', 'email'], 'required'],
            [['rua', 'localidade'], 'string', 'max' => 255],
            [['cp', 'telefone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 200],
            [['telefone'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDginasio' => 'I Dginasio',
            'rua' => 'Rua',
            'localidade' => 'Localidade',
            'cp' => 'Código Postal',
            'telefone' => 'Telefone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdesaos()
    {
        return $this->hasMany(Adesao::className(), ['IDginasio' => 'IDginasio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['IDginasio' => 'IDginasio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGinasioaulas()
    {
        return $this->hasMany(Ginasioaula::className(), ['IDginasio' => 'IDginasio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDaulas()
    {
        return $this->hasMany(Aula::className(), ['IDaula' => 'IDaula'])->viaTable('ginasioaula', ['IDginasio' => 'IDginasio']);
    }
}
