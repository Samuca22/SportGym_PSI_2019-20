<?php

use common\models\Adesao;
use common\models\Perfil;
use common\models\User;
use yii\db\Migration;

/**
 * Class m191218_190118_create_user
 */
class m191218_190118_create_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = "admin";
        $user->email = "admin@admin.com";
        $user->setPassword("admin");
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;
        $user->save();

        $this->insert('perfil', [
            'IDperfil' => $user->getId(),
            'primeiroNome' => 'Admin',
            'apelido' => 'Marques',
            'nSocio' => '990',
            'dtaNascimento' => '1990-12-17',
            'genero' => 'M',
            'telefone' => '91111111',
            'nif' => '212121212',
            'rua' => 'xxxxxx',
            'localidade' => 'xxxxxx',
            'cp' => 'xxxx-xxx',
        ]);;

        $this->insert('adesao', [
            'IDperfil' => $user->getId(),
            'dtaInicio' => date('Y-m-d H:i:s'),

        ]);;

        

        $auth = Yii::$app->authManager;
        $administrador = $auth->getRole("administrador");
        $auth->assign($administrador, $user->getId());

/*
        $user2 = new User();
        $user2->username = "colab";
        $user2->email = "colab@colab.com";
        $user2->setPassword("colab");
        $user2->generateAuthKey();
        $user2->generateEmailVerificationToken();
        $user2->save();

        $perfil2 = new Perfil();
        $perfil2->IDperfil = $user2->getId();
        $perfil2->primeiroNome = "Colab";
        $perfil2->apelido = "Martins";
        $perfil2->nSocio = "991";
        $perfil2->dtaNascimento = "1990-05-12";
        $perfil2->genero = 'M';
        $perfil2->telefone = "912345678";
        $perfil2->nif = "213456789";
        $perfil2->rua = "Estrada da cova, nº2";
        $perfil2->localidade = "Leiria";
        $perfil2->cp = "3214-125";
        $perfil2->save();

        $adesao2 = new Adesao();
        $adesao2->IDginasio = 1;
        $adesao2->IDperfil = $perfil2->IDperfil;
        $adesao2->dtaInicio = date("Y-m-d H:i:s");
        $adesao2->save();

        $colaborador = $auth->getRole("colaborador");
        $auth->assign($colaborador, $user2->getId());



        $user3 = new User();
        $user3->username = "socio";
        $user3->email = "socio@socio.com";
        $user3->setPassword("socio");
        $user3->generateAuthKey();
        $user3->generateEmailVerificationToken();
        $user3->save();

        $perfil3 = new Perfil();
        $perfil3->IDperfil = $user3->getId();
        $perfil3->primeiroNome = "Sócio";
        $perfil3->apelido = "Oliveira";
        $perfil3->nSocio = "992";
        $perfil3->dtaNascimento = "1990-05-12";
        $perfil3->genero = 'M';
        $perfil3->telefone = "911111111";
        $perfil3->nif = "211111111";
        $perfil3->rua = "Estrada da cova, nº2";
        $perfil3->localidade = "Leiria";
        $perfil3->cp = "3214-125";
        $perfil3->save();

        $adesao3 = new Adesao();
        $adesao3->IDginasio = 1;
        $adesao3->IDperfil = $perfil3->IDperfil;
        $adesao3->dtaInicio = date("Y-m-d H:i:s");
        $adesao3->save();

        $socio = $auth->getRole("socio");
        $auth->assign($socio, $user3->getId());*/

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191218_190118_create_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191218_190118_create_user cannot be reverted.\n";

        return false;
    }
    */
}
