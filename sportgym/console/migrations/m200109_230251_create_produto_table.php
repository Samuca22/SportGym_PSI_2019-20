<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%produto}}`.
 */
class m200109_230251_create_produto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produto}}', [
            'IDproduto' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
            'fotoProduto' => 'LONGBLOB',
            'descricao' => $this->string(500)->notNull(),
            'estado' => $this->boolean()->notNull()->defaultValue(0),
            'precoProduto' => $this->double()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%produto}}');
    }
}
