<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhavenda".
 *
 * @property int $IDlinhaVenda
 * @property int $quantidade
 * @property float $subTotal
 * @property int|null $IDvenda
 *
 * @property Venda $iDvenda
 * @property Produto[] $produtos
 */
class LinhaVenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhavenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'subTotal'], 'required'],
            [['quantidade', 'IDvenda'], 'integer'],
            [['subTotal'], 'number'],
            [['IDvenda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['IDvenda' => 'IDvenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDlinhaVenda' => 'I Dlinha Venda',
            'quantidade' => 'Quantidade',
            'subTotal' => 'Sub Total',
            'IDvenda' => 'I Dvenda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDvenda()
    {
        return $this->hasOne(Venda::className(), ['IDvenda' => 'IDvenda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasOne(Produto::className(), ['IDlinhaVenda' => 'IDlinhaVenda']);
    }
}
