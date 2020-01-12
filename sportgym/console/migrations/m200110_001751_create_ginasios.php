<?php

use common\models\Ginasio;
use yii\db\Migration;

/**
 * Class m200110_001751_create_ginasios
 */
class m200110_001751_create_ginasios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $ginasio1 = new Ginasio();
        $ginasio1->rua = 'estrada da frente, nº1';
        $ginasio1->localidade = 'Leiria';
        $ginasio1->cp = '2485-123';
        $ginasio1->email = 'leiria@sportgym.pt';
        $ginasio1->telefone = '212356789';
        $ginasio1->save();

        $ginasio2 = new Ginasio();
        $ginasio2->rua = 'estrada do lado, nº1';
        $ginasio2->localidade = 'Lisboa';
        $ginasio2->cp = '2485-124';
        $ginasio2->email = 'lisboa@sportgym.pt';
        $ginasio2->telefone = '212356781';
        $ginasio2->save();

        $ginasio3 = new Ginasio();
        $ginasio3->rua = 'estrada do outro lado, nº1';
        $ginasio3->localidade = 'Porto';
        $ginasio3->cp = '2485-122';
        $ginasio3->email = 'porto@sportgym.pt';
        $ginasio3->telefone = '212356721';
        $ginasio3->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200110_001751_create_ginasios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_001751_create_ginasios cannot be reverted.\n";

        return false;
    }
    */
}
