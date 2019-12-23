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
 * @property int|null $IDproduto
 *
 * @property Produto $iDproduto
 * @property Venda $iDvenda
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
            [['quantidade'], 'required'],
            [['quantidade', 'IDvenda', 'IDproduto'], 'integer'],
            [['subTotal'], 'number'],
            [['IDproduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['IDproduto' => 'IDproduto']],
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
            'IDproduto' => 'I Dproduto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDproduto()
    {
        return $this->hasOne(Produto::className(), ['IDproduto' => 'IDproduto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDvenda()
    {
        return $this->hasOne(Venda::className(), ['IDvenda' => 'IDvenda']);
    }


    // Chamar ao criar uma linhaVenda ou editar
    public function atualizarSubTotal()
    {
        $produto = $this->iDproduto;;
        $this->subTotal = $produto->precoProduto * $this->quantidade;
        $this->save();
    }

    public function iniciarLinhaVenda($IDvenda)
    {
        $this->IDvenda = $IDvenda;
        $this->quantidade = 0;
        $this->subTotal = 0;
        $this->save();
    }
}
