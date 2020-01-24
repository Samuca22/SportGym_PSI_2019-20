<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m200110_002524_create_users
 */
class m200110_002524_create_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // ADMINISTRADOR
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
            'nSocio' => 1000,
            'dtaNascimento' => '2004-12-03',
            'genero' => 'M',
            'telefone' => '91111111',
            'nif' => '21111111',
            'rua' => 'xxxxxx',
            'localidade' => 'xxxxxx',
            'cp' => 'xxxx-xxx',
        ]);;

        $this->insert('adesao', [
            'IDperfil' => $user->getId(),
            'dtaInicio' => date('Y-m-d H:i:s'),
            'IDginasio' => 1,
        ]);

        $auth = Yii::$app->authManager;
        $administrador = $auth->getRole("administrador");
        $auth->assign($administrador, $user->getId());



        // COLABORADOR
        $user2 = new User();
        $user2->username = "colab";
        $user2->email = "colab@colab.com";
        $user2->setPassword("colab");
        $user2->generateAuthKey();
        $user2->generateEmailVerificationToken();
        $user2->status = 10;
        $user2->save();

        $this->insert('perfil', [
            'IDperfil' => $user2->getId(),
            'primeiroNome' => 'Colab',
            'apelido' => 'Martins',
            'nSocio' => 1001,
            'dtaNascimento' => '2000-12-03',
            'genero' => 'M',
            'telefone' => '91111112',
            'nif' => '21111112',
            'rua' => 'xxxxxx',
            'localidade' => 'xxxxxx',
            'cp' => 'xxxx-xxx',
        ]);;

        $this->insert('adesao', [
            'IDperfil' => $user2->getId(),
            'dtaInicio' => date('Y-m-d H:i:s'),
            'IDginasio' => 2,
        ]);


        $auth = Yii::$app->authManager;
        $colaborador = $auth->getRole("colaborador");
        $auth->assign($colaborador, $user2->getId());




        // SÓCIO
        $user3 = new User();
        $user3->username = "socio";
        $user3->email = "socio@socio.com";
        $user3->setPassword("socio");
        $user3->generateAuthKey();
        $user3->generateEmailVerificationToken();
        $user3->status = 10;
        $user3->save();

        $this->insert('perfil', [
            'IDperfil' => $user3->getId(),
            'primeiroNome' => 'Socio',
            'apelido' => 'Oliveira',
            'nSocio' => 1002,
            'dtaNascimento' => '1990-12-03',
            'genero' => 'M',
            'telefone' => '91111113',
            'nif' => '21111113',
            'rua' => 'xxxxxx',
            'localidade' => 'xxxxxx',
            'cp' => 'xxxx-xxx',
        ]);;

        $this->insert('adesao', [
            'IDperfil' => $user3->getId(),
            'dtaInicio' => date('Y-m-d H:i:s'),
            'IDginasio' => 3,
        ]);


        $auth = Yii::$app->authManager;
        $socio = $auth->getRole("socio");
        $auth->assign($socio, $user3->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200110_002524_create_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_002524_create_users cannot be reverted.\n";

        return false;
    }
    */
}
