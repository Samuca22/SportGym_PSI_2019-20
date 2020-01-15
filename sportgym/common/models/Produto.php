<?php

namespace common\models;

use Exception;
use frontend\mosquitto\phpMQTT;

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
            [['file'], 'file'],
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $IDproduto = $this->IDproduto;
        $nome = $this->nome;
        $descricao = $this->descricao;
        $precoProduto = $this->precoProduto;
        $fotoProduto = $this->fotoProduto;
        $estado = $this->estado;

        $myObj = new \stdClass();
        $myObj->IDproduto = $IDproduto;
        $myObj->nome = $nome;
        $myObj->descricao = $descricao;
        $myObj->precoProduto = $precoProduto;
        $myObj->fotoProduto = $fotoProduto;
        $myObj->estado = $estado;

        try{
            $myJSON = json_encode($myObj);
            if ($insert)
                $this->FazPublish("INSERT", $myJSON);
            else
                $this->FazPublish("UPDATE", $myJSON);
        } catch (Exception $ex){

        }
      
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $IDproduto = $this->IDproduto;
        $myObj = new \stdClass();
        $myObj->IDproduto = $IDproduto;
        $myJSON = json_encode($myObj);
        try{
            $this->FazPublish("DELETE", $myJSON);
        } catch (Exception $ex){
            
        }
        
    }

    public function FazPublish($canal, $msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        } else {
            file_put_contents("debug.output", "Time out!");
        }
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

    public function atribuirImagem()
    {
        $nome_imagem = 'prod' . $this->IDproduto;
        $this->file->saveAs('../../common/uploads/produtos/' . $nome_imagem . '.' . $this->file->extension);
        $this->fotoProduto = $nome_imagem . '.' . $this->file->extension;
    }
}
