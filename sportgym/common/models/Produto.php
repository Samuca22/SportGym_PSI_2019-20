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

    public $file;

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
            [['fotoProduto'], 'string', 'max' => 500],
            [['file'], 'file'],
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
            'fotoProduto' => 'Foto do Produto',
            'descricao' => 'Descrição',
            'estado' => 'Estado',
            'precoProduto' => 'Preço',
            'IDlinhaVenda' => 'I Dlinha Venda',
            //
            'file' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDlinhaVenda()
    {
        return $this->hasOne(Linhavenda::className(), ['IDlinhaVenda' => 'IDlinhaVenda']);
    }

    //Vai buscar a imagem e faz o encoding para Base64
    public function mostrarImagem()
    {
        $path = 'uploads/produtos/' . $this->fotoProduto;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        return $base64;
    }
}
