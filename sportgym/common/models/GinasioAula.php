<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ginasioAula".
 *
 * @property int $IDginasio
 * @property int $IDaula
 */
class GinasioAula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ginasioAula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDginasio', 'IDaula'], 'required'],
            [['IDginasio', 'IDaula'], 'integer'],
            [['IDginasio', 'IDaula'], 'unique', 'targetAttribute' => ['IDginasio', 'IDaula']],
            [['IDaula'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['IDaula' => 'IDaula']],
            [['IDginasio'], 'exist', 'skipOnError' => true, 'targetClass' => Ginasio::className(), 'targetAttribute' => ['IDginasio' => 'IDginasio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDginasio' => 'I Dginasio',
            'IDaula' => 'I Daula',
        ];
    }
}
