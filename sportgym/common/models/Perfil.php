<?php

namespace common\models;

use backend\mosquitto\phpMQTT;
use Exception;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "perfil".
 *
 * @property int $IDperfil
 * @property int $nSocio
 * @property resource|null $fotoProduto
 * @property string $primeiroNome
 * @property string $apelido
 * @property string $genero
 * @property string $telefone
 * @property string $dtaNascimento
 * @property string $rua
 * @property string $localidade
 * @property string $cp
 * @property string $nif
 * @property float|null $peso
 * @property float|null $altura
 * @property User $iDperfil
 * @property Perfilaula[] $perfilaulas
 * @property Aula[] $iDaulas
 * @property Perfilplano[] $perfilplanos
 * @property Plano[] $iDplanos
 * @property Venda[] $vendas
 */
class Perfil extends \yii\db\ActiveRecord
{
    public $estatuto;
    public $email;
    public $username;
    public $pass_antiga;
    public $pass_nova;
    public $pass_confirmar;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['primeiroNome', 'apelido', 'genero', 'telefone', 'dtaNascimento', 'rua', 'localidade', 'cp', 'nif'], 'required', 'message' => 'Preencha os campos'],
            [['IDperfil', 'nSocio'], 'integer'],
            [['genero'], 'string'],
            [['dtaNascimento'], 'safe'],
            [['dtaNascimento'], 'date', 'format' => 'yyyy-M-d', 'message' => 'Formato data: aaaa-mm-dd'],
            [['peso', 'altura'], 'number', 'min' => 0, 'max' => 999],
            [['primeiroNome'], 'string', 'max' => 50],
            [['apelido'], 'string', 'max' => 30],
            [['telefone', 'rua', 'nif'], 'string', 'max' => 15],
            [['localidade', 'cp'], 'string', 'max' => 255],
            [['nSocio'], 'unique'],
            [['telefone'], 'unique'],
            [['nif'], 'unique'],
            [['foto'], 'file'],
            [['estatuto', 'email'], 'safe'],
            ['email', 'email', 'message' => 'Introduza um email válido'],
            ['email', 'string', 'max' => 255],
            [['IDperfil'], 'unique'],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDperfil' => 'id']],

            [
                ['username'], 'unique', 
                'targetAttribute' => 'username', 
                'targetClass' => '\common\models\User', 
                'message' => 'Username Indisponível',
                'when' => function ($model) {
                    return $model->username != Yii::$app->user->identity->username; // or other function for get current username
                }
            ],


            [['pass_nova', 'pass_antiga', 'pass_confirmar'], 'safe'],
            [['pass_nova', 'pass_confirmar'], 'string', 'min' => 4],
            [['pass_nova', 'pass_confirmar'], 'filter', 'filter' => 'trim'],
            [['pass_confirmar'], 'compare', 'compareAttribute' => 'pass_nova', 'message' => 'Password Diferentes'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nSocio' => 'Nº Socio',
            'foto' => 'Foto',
            'primeiroNome' => 'Primeiro Nome',
            'apelido' => 'Apelido',
            'genero' => 'Genero',
            'telefone' => 'Telefone',
            'dtaNascimento' => 'Data de Nascimento',
            'rua' => 'Rua',
            'localidade' => 'Localidade',
            'cp' => 'Código Postal',
            'nif' => 'NIF',
            'peso' => 'Peso',
            'altura' => 'Altura',
            'estatuto' => 'Estatuto',
            'foto' => 'Fotografia',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            if ($file = UploadedFile::getInstance($this, 'foto')) {
                $this->foto = file_get_contents($file->tempName);
            }
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $IDperfil = $this->IDperfil;
        $primeiroNome = $this->primeiroNome;
        $apelido = $this->apelido;
        $nSocio = $this->nSocio;
        $genero = $this->genero;
        $telefone = $this->telefone;
        $dtaNascimento = $this->dtaNascimento;
        $rua = $this->rua;
        $localidade = $this->localidade;
        $cp = $this->cp;
        $nif = $this->nif;
        $peso = $this->peso;
        $altura = $this->altura;



        $myObj = new \stdClass();
        $myObj->IDperfil = $IDperfil;
        $myObj->primeiroNome = $primeiroNome;
        $myObj->apelido = $apelido;
        $myObj->nSocio = $nSocio;
        $myObj->genero = $genero;
        $myObj->telefone = $telefone;
        $myObj->dtaNascimento = $dtaNascimento;
        $myObj->rua = $rua;
        $myObj->localidade = $localidade;
        $myObj->cp = $cp;
        $myObj->nif = $nif;
        $myObj->peso = $peso;
        $myObj->altura = $altura;

        try{
            $myJSON = json_encode($myObj);
            if ($insert)
                $this->FazPublish("INSERCAO_PERFIL", $myJSON);
            else
                $this->FazPublish("EDICAO_PERFIL", $myJSON);
        } catch(Exception $ex){

        }
        
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $IDperfil = $this->IDperfil;
        $myObj = new \stdClass();
        $myObj->IDperfil = $IDperfil;
        $myJSON = json_encode($myObj);
        try{
            $this->FazPublish("APAGAR_PERFIL", $myJSON);
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
    public function getIDperfil()
    {
        return $this->hasOne(User::className(), ['id' => 'IDperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilaulas()
    {
        return $this->hasMany(Perfilaula::className(), ['IDperfil' => 'IDperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDaulas()
    {
        return $this->hasMany(Aula::className(), ['IDaula' => 'IDaula'])->viaTable('perfilaula', ['IDperfil' => 'IDperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilplanos()
    {
        return $this->hasMany(Perfilplano::className(), ['IDperfil' => 'IDperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDplanos()
    {
        return $this->hasMany(Plano::className(), ['IDplano' => 'IDplano'])->viaTable('perfilplano', ['IDperfil' => 'IDperfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['IDperfil' => 'IDperfil']);
    }

    public function getAdesoes()
    {
        return $this->hasMany(Adesao::className(), ['IDperfil' => 'IDperfil']);
    }

    public function alterarEstatuto($role)
    {
        $auth = Yii::$app->authManager;

        if ($this->estatuto == 1) {
            $auth->revoke($role, $this->IDperfil);
            $socio = $auth->getRole('socio');
            $auth->assign($socio, $this->IDperfil);
        }

        if ($this->estatuto == 2) {
            $auth->revoke($role, $this->IDperfil);
            $colab = $auth->getRole('colaborador');
            $auth->assign($colab, $this->IDperfil);
        }

        if ($this->estatuto == 3) {
            $auth->revoke($role, $this->IDperfil);
            $admin = $auth->getRole('administrador');
            $auth->assign($admin, $this->IDperfil);
        }
    }

    public function adicionarImagemUpdate($novaFoto, $oldImage)
    {
        if($novaFoto != '')
        {
            $this->foto = file_get_contents($novaFoto->tempName);
        } else {
            $this->foto = $oldImage;
        }
    }
}
