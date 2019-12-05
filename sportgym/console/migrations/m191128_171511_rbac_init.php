<?php

use yii\db\Migration;

/**
 * Class m191128_171511_rbac_init
 */
class m191128_171511_rbac_init extends Migration
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

        $admin = $auth->createRole('admnistrador');
        $auth->add($admin);

        // Criar Permissões

        $entrarFront = $auth->createPermission('entrarFront');
        $entrarFront->description = 'permite entrar no frontoffice';
        $auth->add($entrarFront);

        $entrarBack = $auth->createPermission('entrarBack');
        $entrarFront->description = 'permite entrar no backoffice';
        $auth->add($entrarBack);

        // Atribui Permissões

        $auth->addChild($socio, $entrarFront);
        $auth->addChild($colab, $entrarBack);
        $auth->addChild($colab, $socio);
        $auth->addChild($admin, $colab);


        // Atribuir Roles
        $auth->assign($admin, 1);
        $auth->assign($colab, 2);
        $auth->assign($socio, 3);
        
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191128_171511_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
