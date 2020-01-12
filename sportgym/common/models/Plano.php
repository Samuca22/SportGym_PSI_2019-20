<?php

namespace common\models;
use backend\mosquitto\phpMQTT;

use Exception;
use Yii;

/**
 * This is the model class for table "plano".
 *
 * @property int $IDplano
 * @property string $nome
 * @property int $tipo
 * @property string|null $descricao
 *
 * @property Perfilplano[] $perfilplanos
 * @property Perfil[] $iDperfils
 */
class Plano extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plano';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 5000],
            [['tipo'], 'boolean'],

            [['nome'], 'required', 'message' => 'Introduza um nome para o plano'],
            [['descricao'], 'required', 'message' => 'Introduza a descrição do plano'],
            [['tipo'], 'required', 'message' => 'Selecione o tipo de plano'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDplano' => 'I Dplano',
            'nome' => 'Nome',
            'tipo' => 'Tipo de Plano',

        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $IDplano = $this->IDplano;
        $nome = $this->nome;
        $descricao = $this->descricao;
        $tipo = $this->tipo;



        $myObj = new \stdClass();
        $myObj->IDplano = $IDplano;
        $myObj->nome = $nome;
        $myObj->descricao = $descricao;
        $myObj->tipo = $tipo;

        try{
            $myJSON = json_encode($myObj);
            if ($insert)
                $this->FazPublish("INSERCAO_PLANO", $myJSON);
            else
                $this->FazPublish("EDICAO_PLANO", $myJSON);
        } catch(Exception $ex){

        }
        
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $IDplano = $this->IDplano;
        $myObj = new \stdClass();
        $myObj->IDplano = $IDplano;
        $myJSON = json_encode($myObj);
        try{
            $this->FazPublish("APAGAR_PLANO", $myJSON);
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
    public function getPerfilplanos()
    {
        return $this->hasMany(Perfilplano::className(), ['IDplano' => 'IDplano']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDperfils()
    {
        return $this->hasMany(Perfil::className(), ['IDperfil' => 'IDperfil'])->viaTable('perfilplano', ['IDplano' => 'IDplano']);
    }

    public function atribuirNomeFromBack()
    {
        $this->nome = 'sportgym' . $this->IDplano . '_' . $this->nome;
        $this->save();
    }

    public function verificarAtribuicaoPlano()
    {
        $planoAssociado = PerfilPlano::find()->where(['IDplano' => $this->IDplano])->all();

        if($planoAssociado == null){
            return true;
        } else {
            return false;
        }
    }
}
