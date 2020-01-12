<?php

use yii\db\Migration;

/**
 * Class m200110_000907_rbac_init
 */
class m200110_000907_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;


        // Criar Roles (papéis)
        
        $socio = $auth->createRole('socio');
        $auth->add($socio);

        $colab = $auth->createRole('colaborador');
        $auth->add($colab);

        $admin = $auth->createRole('administrador');
        $auth->add($admin);


        // Criar Permissões

        $entrarFront = $auth->createPermission('entrarFront');
        $entrarFront->description = 'permite entrar no frontoffice';
        $auth->add($entrarFront);

        $entrarBack = $auth->createPermission('entrarBack');
        $entrarFront->description = 'permite entrar no backoffice';
        $auth->add($entrarBack);

        $criarEditarGinasios = $auth->createPermission('criarEditarGinasios');
        $criarEditarGinasios->description = 'permissão para criar e editar novos registos de ginásios';
        $auth->add($criarEditarGinasios);

        $alterarEstadoProdutos = $auth->createPermission('alterarEstadoProdutos');
        $alterarEstadoProdutos->description = 'permissão para alerar o estado dos produtos';
        $auth->add($alterarEstadoProdutos);

        $alterarEstatuto = $auth->createPermission('alterarEstatuto');
        $alterarEstatuto->description = 'permissão para alerar o estado de perfis';
        $auth->add($alterarEstatuto);

        $cancelarInscricaoAula = $auth->createPermission('cancelarInscricaoAula');
        $cancelarInscricaoAula->description = 'permissão para alerar o estado de perfis';
        $auth->add($cancelarInscricaoAula);


        // Atribui Permissões

        $auth->addChild($socio, $entrarFront);
        $auth->addChild($colab, $entrarBack);
        $auth->addChild($colab, $socio);
        $auth->addChild($admin, $colab);
        $auth->addChild($admin, $criarEditarGinasios);
        $auth->addChild($admin, $alterarEstadoProdutos);
        $auth->addChild($admin, $alterarEstatuto);
        $auth->addChild($admin, $cancelarInscricaoAula);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200110_000907_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_000907_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
