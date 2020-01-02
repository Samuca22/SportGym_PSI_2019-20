<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $IDproduto
 * @property string $nome
 * @property string $fotoProduto
 * @property string $descricao
 * @property int $estado
 * @property float $precoProduto
 *
 * @property Linhavenda[] $linhavendas
 */
class Produto extends \yii\db\ActiveRecord
{
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
            [['nome'], 'required', 'message' => 'Introduza um nome para o produto'],
            [['precoProduto'], 'required', 'message' => 'Introduza um preço para o produto'],
            [['descricao'], 'required', 'message' => 'Introduza uma descrição para o produto'],
            [['fotoProduto'], 'string', 'max' => 500],
            [['estado'], 'integer'],
            [['precoProduto'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 500],
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
            //
            'file' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhavendas()
    {
        return $this->hasMany(Linhavenda::className(), ['IDproduto' => 'IDproduto']);
    }

    //Vai buscar a imagem e faz o encoding para Base64
    public function mostrarImagem()
    {

        if ($this->fotoProduto == '') {
            $path = '../../common/uploads/produtos/no_prod.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        } else {
            $path = '../../common/uploads/produtos/' . $this->fotoProduto;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        }
    }

    public function alterarEstado()
    {
        if ($this->estado == 0) {
            return $this->estado = 1;
        } else {
            return $this->estado = 0;
        }
    }
}
