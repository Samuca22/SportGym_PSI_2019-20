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
<<<<<<< HEAD
=======

>>>>>>> GoncaloAula
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
<<<<<<< HEAD
            [['IDperfil', 'IDaula', 'nSocio',], 'required'],
=======
            [[/*'IDperfil',*/ 'IDaula', 'nSocio'], 'required'],
>>>>>>> GoncaloAula
            [['IDperfil', 'IDaula'], 'integer'],
            [['IDperfil', 'IDaula'], 'unique', 'targetAttribute' => ['IDperfil', 'IDaula']],
            [['IDaula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['IDaula' => 'IDaula']],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['IDperfil' => 'IDperfil']],
            [['nSocio'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['nSocio' => 'nSocio']],
<<<<<<< HEAD

=======
>>>>>>> GoncaloAula
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nSocio' => 'Número de Sócio',
<<<<<<< HEAD
            'IDperfil' => 'I Dperfil',
            'IDaula' => 'I Daula',
=======
            'IDperfil' => 'ID perfil',
            'IDaula' => 'ID aula',
>>>>>>> GoncaloAula
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
