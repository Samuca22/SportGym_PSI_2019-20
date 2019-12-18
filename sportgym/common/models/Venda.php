<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property int $IDvenda
 * @property int $estado
 * @property string $dataVenda
 * @property float $total
 * @property int|null $IDperfil
 *
 * @property Linhavenda[] $linhavendas
 * @property Perfil $iDperfil
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dataVenda', 'total'], 'required'],
            [['estado', 'IDperfil'], 'integer'],
            [['dataVenda'], 'safe'],
            [['total'], 'number'],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['IDperfil' => 'IDperfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDvenda' => 'ID venda',
            'estado' => 'Estado',
            'dataVenda' => 'Data Venda',
            'total' => 'Total',
            'IDperfil' => 'ID perfil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhavendas()
    {
        return $this->hasMany(Linhavenda::className(), ['IDvenda' => 'IDvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfil()
    {
        return $this->hasOne(Perfil::className(), ['IDperfil' => 'IDperfil']);
    }

    // Chamar ao criar uma linhaVenda
    public function atualizarTotal(){
        $this->total = LinhaVenda::find()->where(['IDvenda' => $this->IDvenda])->sum('subTotal');
        $this->save();
    }
}
