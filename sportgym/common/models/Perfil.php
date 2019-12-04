<?php

namespace common\models;

use Yii;

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
            [['IDperfil', 'nSocio', 'primeiroNome', 'apelido', 'genero', 'telefone', 'dtaNascimento', 'rua', 'localidade', 'cp', 'nif'], 'required'],
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
            [['IDperfil'], 'unique'],
            [['IDperfil'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDperfil' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDperfil' => 'I Dperfil',
            'nSocio' => 'N Socio',
            'foto' => 'Foto',
            'primeiroNome' => 'Primeiro Nome',
            'apelido' => 'Apelido',
            'genero' => 'Genero',
            'telefone' => 'Telefone',
            'dtaNascimento' => 'Dta Nascimento',
            'rua' => 'Rua',
            'localidade' => 'Localidade',
            'cp' => 'Cp',
            'nif' => 'Nif',
            'peso' => 'Peso',
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
}
