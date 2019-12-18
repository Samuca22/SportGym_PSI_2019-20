<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "perfil".
 *
 * @property int $IDperfil
 * @property int $nSocio
 * @property string|null $foto
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
 *
 * @property User $iDperfil
 * @property Perfilaula[] $perfilaulas
 * @property Aula[] $iDaulas
 * @property Perfilplano[] $perfilplanos
 * @property Plano[] $iDplanos
 * @property Venda[] $vendas
 */
class Perfil extends \yii\db\ActiveRecord
{
    public $file;
    public $estatuto;
    public $email;
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
            [[/*'IDperfil', 'nSocio', */'primeiroNome', 'apelido', 'genero', 'telefone', 'dtaNascimento', 'rua', 'localidade', 'cp', 'nif'], 'required', 'message' => 'Preencha os campos'],
            [['IDperfil', 'nSocio'], 'integer'],
            [['genero'], 'string'],
            [['dtaNascimento'], 'safe'],
            [['peso'], 'number'],
            [['foto'], 'string', 'max' => 500],
            [['primeiroNome'], 'string', 'max' => 50],
            [['apelido'], 'string', 'max' => 30],
            [['telefone', 'rua', 'nif'], 'string', 'max' => 15],
            [['localidade', 'cp'], 'string', 'max' => 255],
            [['nSocio'], 'unique'],
            [['telefone'], 'unique'],
            [['nif'], 'unique'],
            [['file'], 'file'],
            [['estatuto', 'email'], 'safe'],
            //[['email'], 'required', 'message' => 'Preencha os campos'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            //[['IDperfil'], 'unique'],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDperfil' => 'id']],
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

            'estatuto' => 'Estatuto',
            'file' => 'Foto',
        ];
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

    public function mostrarImagem()
    {
        if ($this->foto == '') {
            $path = 'uploads/perfis/no_prof.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        } else {
            $path = 'uploads/perfis/' . $this->foto;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            return $base64;
        }
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

    public function atribuirImagem()
    {
        $nome_imagem = 'prof' . $this->nSocio;    //Atribui nome aleatório ao ficheiro 
        $this->file->saveAs('uploads/perfis/' . $nome_imagem . '.' . $this->file->extension);
        $this->foto = $nome_imagem . '.' . $this->file->extension;
    }
}