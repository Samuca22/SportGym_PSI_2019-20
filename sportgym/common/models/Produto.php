<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $IDproduto
 * @property string $nome
 * @property resource $fotoProduto
 * @property string $descricao
 * @property int $estado
 * @property float $precoProduto
 * @property int|null $IDlinhaVenda
 *
 * @property Linhavenda $iDlinhaVenda
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'fotoProduto', 'descricao', 'estado', 'precoProduto'], 'required'],
            [['fotoProduto'], 'string'],
            [['estado', 'IDlinhaVenda'], 'integer'],
            [['precoProduto'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 500],
            [['IDlinhaVenda'], 'exist', 'skipOnError' => true, 'targetClass' => Linhavenda::className(), 'targetAttribute' => ['IDlinhaVenda' => 'IDlinhaVenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDproduto' => 'I Dproduto',
            'nome' => 'Nome',
            'fotoProduto' => 'Foto Produto',
            'descricao' => 'Descricao',
            'estado' => 'Estado',
            'precoProduto' => 'Preco Produto',
            'IDlinhaVenda' => 'I Dlinha Venda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDlinhaVenda()
    {
        return $this->hasOne(Linhavenda::className(), ['IDlinhaVenda' => 'IDlinhaVenda']);
    }
}
