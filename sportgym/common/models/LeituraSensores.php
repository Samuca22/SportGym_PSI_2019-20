<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "leitura_sensores".
 *
 * @property float $temperatura
 * @property int $humidade
 * @property float $luminosidade
 * @property string $descricao
 */
class LeituraSensores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leitura_sensores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['temperatura', 'humidade', 'luminosidade', 'descricao'], 'required'],
            [['temperatura', 'luminosidade'], 'number'],
            [['humidade'], 'integer'],
            [['descricao'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'temperatura' => 'Temperatura',
            'humidade' => 'Humidade',
            'luminosidade' => 'Luminosidade',
            'descricao' => 'Descricao',
        ];
    }
}
