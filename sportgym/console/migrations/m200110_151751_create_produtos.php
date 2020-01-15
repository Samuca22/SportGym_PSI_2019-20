<?php

use yii\db\Migration;

/**
 * Class m200110_151751_create_produtos
 */
class m200110_151751_create_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('produto', [
            'IDproduto' => '1',
            'nome' => 'Shaker',
            'descricao' => 'Nam neque metus, malesuada vel tristique fermentum, aliquet sit amet nisl. 
            Vivamus vitae elit vitae risus mollis vulputate. Praesent sagittis, magna malesuada cursus tempus, est ligula gravida ipsum, sit amet aliquam est dolor eget est. 
            Aliquam vel venenatis sapien, quis malesuada ex. Cras tincidunt ac magna sit amet bibendum.
            Sed convallis velit in vestibulum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
            'precoProduto' => 15,
        ]);
        
        $this->insert('produto', [
            'IDproduto' => '2',
            'nome' => 'Batata Frita',
            'descricao' => 'Nam neque metus, malesuada vel tristique fermentum, aliquet sit amet nisl. 
            Vivamus vitae elit vitae risus mollis vulputate. Praesent sagittis, magna malesuada cursus tempus, est ligula gravida ipsum, sit amet aliquam est dolor eget est. 
            Aliquam vel venenatis sapien, quis malesuada ex. Cras tincidunt ac magna sit amet bibendum.
            Sed convallis velit in vestibulum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
            'precoProduto' => 25,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200110_151751_create_produtos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_151751_create_produtos cannot be reverted.\n";

        return false;
    }
    */
}
